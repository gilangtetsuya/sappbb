<?php 

$aColumns = array('');

$sIndexColumn = "a.THN_PELAYANAN"; 

$sTables = array('');

$gaSql['user'] = "pbb";
$gaSql['password'] = "pbb";
$gaSql['schema'] = "orcl";
$gaSql['port'] = "1521";
$gaSql['server'] = "127.0.0.1";

$connection_string = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)
(HOST = {$gaSql['server']})(PORT = {$gaSql['port']})))(CONNECT_DATA=(SID={$gaSql['schema']})))";

$conn = oci_connect($gaSql['user'], $gaSql['password'], $connection_string);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sLimit = "";
if (isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1') {
    
    $sLimit = "WHERE rowsNumerator BETWEEN :iDisplayStart AND :iDisplayEnd";

}

if (isset( $_GET['iShortCol_0'] )) 
{
    $sOrder = "ORDER BY ";

    for ($i = 0; $i<intval( $_GET['iShortingCols'] ); $i++) 
    {
        if ($_GET['bShortable_'.intval($_GET['iShortCol_'.$i])] == 'true') 
        {
            $sOrder .= $aColumns[ intval($_GET['iShortCol_'.$i]) ];

            if (strcasecmp(( $_GET['sSortDir_'.$i] ), "asc") == 0)
            {
                $sOrder .=" asc, ";
            } else
            {
                $sOrder .=" desc, ";
            } 
        }

        $sOrder = substr_replace( $sOrder, "", -2 );

        if ( $sOrder == "ORDER BY" )
        {
    
            $sOrder = "ORDER BY ".$sIndexColumn;
            
        } 
    }

    
} 


?>