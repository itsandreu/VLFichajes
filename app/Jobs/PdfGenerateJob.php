<?php

namespace App\Jobs;

use App\Models\Document;
use App\Models\Fichaje;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Dompdf\Dompdf;

class PdfGenerateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userObject;
    protected $data;
    /**
     * Create a new job instance.
     */
    public function __construct($userObject, $data)
    {
        $this->userObject = $userObject;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $seleccion = $this->data['mes'];
        list($month, $year) = explode('-', $seleccion);

        Carbon::setLocale('es');

        $monthName = Carbon::createFromDate(null, $month, 1)->translatedFormat('F');
        $fichajes = Fichaje::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->where('user_id', $this->userObject->id)
            ->get();

        $html = '<html lang="es">
        <head>
        <meta charset="UTF-8">
        <title>Monthly Work Hours Summary</title>
        <style>
        table {
            width: 80%; /* Reducir el ancho de la tabla */
            font-size: 10px; /* Reducir el tamaño del texto */
            border-collapse: collapse;
            border: 1px solid black;
          }
          h2 {
            font-size: 16px;
          }
          th, td {
            border: 1px solid black;
            padding: 3px; /* Reducir el padding */
            text-align: left;
          }
          th {
            background-color: #f2f2f2;
          }
          th:first-child {
            width: 20px;
          }
          th:first-child, td:first-child {
            text-align: center;
          }
          p {
            font-size: 12px; /* Reducir el tamaño del texto para el párrafo */
            margin-bottom: 5px; /* Reducir el margen inferior del párrafo */
          }
        </style>
        </head>
        <body>
        

        <h2>Listado Resumen mensual del registro de jornada (detalle horario)</h2>
        
        <table>
        <tr>
            <th>Empresa:</th>
            <td>VIRTUAL LEMON, S.L.</td>
            <th>Trabajador:</th>
            <td>' . $this->userObject->Name . ' ' . $this->userObject->apellido1 . ' ' . $this->userObject->apellido2 . '</td>
        </tr>
        <tr>
            <th>C.I.F./N.I.F.:</th>
            <td>B79330109</td>
            <th>N.I.F.:</th>
            <td>' . $this->userObject->nif . '</td>
        </tr>
        <tr>
            <th>Centro de Trabajo:</th>
            <td>VIRTUAL LEMON, S.L.(PROD AUDIO)</td>
            <th>Nº Afiliación:</th>
            <td>' . $this->userObject->afiliacion . '</td>
        </tr>
        <tr>
            <th>C.C.C.:</th>
            <td>461/545789/01</td>
            <th>Mes y Año:</th>
            <td>' . $month . '/' . $year . '</td>
        </tr>
        </table>
        
        <br>
        
        <table>
        <tr>
            <th colspan="1">DÍA</th>
            <th colspan="2">MAÑANAS</th>
            <th colspan="2">TARDES</th>
            <th>FIRMA DEL TRABAJADOR/A</th>
        </tr>
        <tr>
            <th></th>
            <th>ENTRADA</th>
            <th>SALIDA</th>
            <th>ENTRADA</th>
            <th>SALIDA</th>
            <th></th>
        </tr>
        <!-- Repeat this part for each day of the month -->
        <!-- ... up to day 31 ... -->';

        $mesactual = $this->data['mes'];
        foreach ($fichajes->sortBy('hora_entrada_mañana') as $fichaje) {
            $name = $this->userObject->name . " " . $this->userObject->apellido1 . " " . $this->userObject->apellido2;
            $dia = Carbon::parse($fichaje->hora_entrada_mañana)->translatedFormat('j');
            $horaentradamañana = Carbon::parse($fichaje->hora_entrada_mañana)->format('H:i');
            $horasalidamañana = Carbon::parse($fichaje->hora_salida_mañana)->format('H:i');
            $horaentradatarde = Carbon::parse($fichaje->hora_entrada_tarde)->format('H:i');
            $horasalidatarde = Carbon::parse($fichaje->hora_salida_mañana)->format('H:i');

            $path = storage_path("/app/public/" . $this->userObject->media);
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $imagen = '<img src="' . $base64 . '" style="width:150px; height:15px; text-align: center;">';


            $pathVirtual = storage_path("/app/public/doc/Firma-virtual.png");
            $typeVirtual = pathinfo($pathVirtual, PATHINFO_EXTENSION);
            $dataVirtual = file_get_contents($pathVirtual);
            $base64Virtual = 'data:image/' . $typeVirtual . ';base64,' . base64_encode($dataVirtual);
            $imagenVirtual = '<img src="' . $base64Virtual . '" style="width:100px; height:25px; text-align: center;">';

            $html .= '<tr>
                <td>' . $dia . '</td>
                <td>' . $horaentradamañana . '</td>
                <td>' . $horasalidamañana . '</td>
                <td>' . $horaentradatarde . '</td>
                <td>' . $horasalidatarde . '</td>
                <td>' . $imagen . '</td>
                <!-- Agrega más celdas según los datos que quieras mostrar -->
                </tr>';
        }

        $html .= '<tr>
        <th>TOTAL HORAS.</th>
        <td colspan="5"></td>
      </tr>
    </table>
    
    <br>
    
    <table>
      <tr>
        <th>Firma de la empresa:</th>
        <td>' . $imagenVirtual . '</td>
        <th>Firma del trabajador:</th>
        <td>' . $imagen . '</td>
      </tr>
    </table>
    
    <p>En <span>PATERNA</span> a <span>31</span> de <span>ENERO</span> de <span>2024</span></p>
    
    <p>Registro realizado en cumplimiento 
      del Art. 34.9 del texto refundido de 
      la Ley del Estatuto de los Trabajadores.</p>
    
    <p>La empresa conservará los registros a que
     se refiere este precepto durante cuatro años
        y permanecerán a disposición de las personas trabajadoras,
         de sus representantes legales y de la Inspección de Trabajo y Seguridad Social.</p>
    
    </body>
    </html>';

        // Crear el objeto Dompdf
        $dompdf = new Dompdf();

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Guardar o enviar el PDF según sea necesario
        $output = $dompdf->output();

        file_put_contents(public_path('storage/doc/' . $monthName . "-" . $year . "-" . $name . '.pdf'), $output);
        Document::create([
            'name' => $monthName . "-" . $year . "-" . $name,
            'media' => 'doc/' . $monthName . "-" . $year . "-" . $name . '.pdf',
            'date' => $monthName . "-" . $year,
            'user_id' => $this->userObject->id,
        ]);
        // Puedes guardar el PDF en el sistema de archivos

        // O enviarlo al navegador para descargarlo directamente
        // header('Content-Type: application/pdf');
        // echo $output;
    }
}
