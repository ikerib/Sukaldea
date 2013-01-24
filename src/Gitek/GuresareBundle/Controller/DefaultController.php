<?php

namespace Gitek\GuresareBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $url = "https://my.sharepoint.com/sites/mysite/_layouts/listfeed.aspx?List=listid";
        $user = "YourDomainUser";
        $pass = "YourDomainPassowd";

        $this->get('anchovy.curl')->setURL($url)->execute();

        //Open file to be written to
        $temp_file = "/tmp/sukaldea.xml";
        $fp = fopen($temp_file, 'w');

        //Initialize a cURL session
        $curl = curl_init();

        //Return the transfer as a string of the return value of curl_exec() instead of outputting it out directly
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //The URL to fetch
        curl_setopt($curl, CURLOPT_URL, $url);

        //Force HTTP version 1.1
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        //Use NTLM for HTTP authentication
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);

        //Username/password to use for the connection
        curl_setopt($curl, CURLOPT_USERPWD, $user . ':' . $pass);

        //Stop cURL from verifying the peer's certification
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //Execute cURL session
        $result = curl_exec($curl);

        //Close cURL session
        curl_close($curl);

        fwrite($fp, $result);
        fclose($fp);

        // if (file_exists('/tmp/sukaldea.xml')) {
        //    $xml = simplexml_load_file('/tmp/sukaldea.xml');
        // } else {
        //     exit('Error abriendo test.xml.');
        // }

        $xml = simplexml_load_string($result);

        $sukaldea = array();
        $fec="";
        $i=0;

        // Write my data to array
        // Each item description have this data:
        // Date ( called Data/Fecha)
        // First dish ( called Lehena / Primero)
        // Second dish (called Bigarrena / Segundo)
        // Desert ( called Postrea)
        foreach($xml->channel->item as $item){

            $description = addslashes($item->description);

            $arr = explode("\n", strip_tags(substr($description, 8, strlen($description)-12)));

            //Loop through each column in description
            foreach($arr as $val)
            {
                $tmp = explode(':', $val);

                $column_name = trim($tmp[0]);
                $column_value = trim($tmp[1]);

                switch ($column_name) {
                    case 'Data/Fecha':
                        $sukaldea[$column_value]=array();
                        $fec = $column_value;
                        break;

                    case 'Lehena / Primero':
                        $sukaldea[$fec][0] = array($column_name => $column_value);

                    case 'Bigarrena / Segundo':
                        $sukaldea[$fec][1] = array($column_name => $column_value);

                    case 'Postrea':
                        $sukaldea[$fec][2] = array($column_name => $column_value);

                    default:

                        break;
                }

            }
        }

        $response = new \Symfony\Component\HttpFoundation\Response(json_encode($sukaldea));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
