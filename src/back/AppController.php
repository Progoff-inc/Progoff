<?php
require 'repository.php';
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization");

$ctxt = new DataBase();
if(isset($_GET['Key']))
{
    
    switch ($_GET['Key']) {
        case 'get-clients':
             $ctxt->setEnter($_SERVER['REMOTE_ADDR']);
            echo json_encode($ctxt->getClients());
            break;
        case 'get-client':
            echo json_encode($ctxt->getClient($_GET['Id']));
            break;
        case 'get-prices':
            echo json_encode($ctxt->getPrices());
            break;
        case 'get-team':
            echo json_encode($ctxt->getTeam());
            break;
        case 'get-jobs':
            echo json_encode($ctxt->getJobs());
            break;
        case 'add-app':
            $b = json_decode(file_get_contents('php://input'), true);
            echo json_encode($ctxt->addApp($b['App'], $b['Attachment']));
            break;
        case 'get-sales':
            echo json_encode($ctxt->getSales());
            break;
        case 'get-makets':
            echo json_encode($ctxt->getMakets());
            break;
        case 'get-maket':
            echo json_encode($ctxt->getMaket($_GET['Id']));
            break;
        //case 'set-names':
        //    $basepath = 'Files/Makets';
        //   $filelist = scandir($basepath);
        //    foreach($filelist as $i => $filename) {
        //        if($filename !== '.' && $filename !== '..') {
        //             rename ($basepath.'/'.$filename, $basepath.'/'.$i.'.jpg');
        //        }
        //    }
        //    break;
        // case 'upload-file':
        //     $inp = json_decode(file_get_contents('php://input'), true);
        //     echo json_encode(array($ctxt->uploadFile($_GET['Id'], $_FILES, $_GET['Type'])));
        //     break;
        default:
            echo "Введенный ключ несуществует";
        
    }
    
}
else
{  
    echo "Введенные данные некорректны";
}
?>