 <?php
    include('assets/inc/config.php');  
    $ret="SELECT * FROM  formulario where id_propImovel=1"; 
    $stmt= $mysqli->prepare($ret) ;
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    $doc="<h2> Dados do formulário agregado familiar</h2>";
    $doc .="<table border='1'>";
    $doc .="<td>ID</td>";
    $doc .="<td>Nome proprietário do Imóvel</td>";
    $doc .="<td>Nome</td>";
    $doc .="<td>Parentesco</td>";
    $doc .="<td>Grau parentesco</td>";
    $doc .="<td>Profissão</td>";
    $doc .="<td>Habilitações</td>";
    $doc .="<td>Data nasc</td>";
    while($row=$res->fetch_object())
    {
    $doc .="<tr>";
    $doc .="<td>".$row->id_propImovel."</td>";
    $doc .="<td>".$row->nome_propImovel."</td>";
    $doc .="<td>".$row->nome_agreg."</td>";
    $doc .="<td>".$row->nome_agreg."</td>";
    $doc .="<td>".$row->grau_parentesco_agreg."</td>";
    $doc .="<td>".$row->profissao_agreg."</td>";
    $doc .="<td>".$row->habilitacoes_agreg."</td>";
    $doc .="<td>".$row->data_nasc_agreg."</td>";
    $doc .="</tr>";
    } 
    $doc .="</table>";
    //dados tabela proprietario_imovel
    // $ret="SELECT  * FROM proprietario_imovel WHERE id=1";
    // $stmt= $mysqli->prepare($ret) ;
    // $stmt->bind_param('i',$id);
    // $stmt->execute() ;//ok
    // $res=$stmt->get_result();
    // $doc .="<p></P>";
    // $doc .="<p></P>";
    // $doc .="<table border='1'>";
    // $doc .="<td>Numero da casa</td>";
    // $doc .="<td>Quarteirao</td>";
    // $doc .="<td>Numero do bloco</td>";
    // while($row=$res->fetch_object())
    //         {
    //             $doc .="<tr>";
    //             $doc .="<td>".$row->num_casa."</td>";
    //             $doc .="<td>".$row->num_quarteirao."</td>";
    //             $doc .="<td>".$row->num_bloco."</td>";
    //             $doc .="</tr>";
    //         }
    // $doc .="</table>";
    //dado funcionario
    // $ret="SELECT  * FROM funcionario WHERE id=?";
    // $stmt= $mysqli->prepare($ret) ;
    // $stmt->bind_param('i',$id);
    // $stmt->execute() ;//ok
    // $res=$stmt->get_result();
    // $doc .="<p></P>";
    // $doc .="<p></P>";
    // $doc .="<h3> Dados da estrutura administrativa</h3>";
    // $doc .="<table border='1'>";
    // $doc .="<td>Nome</td>";
    // $doc .="<td>Funcao</td>";
    // $doc .="<td>Email</td>";
    // $doc .="<td>Contacto</td>";
    // while($row=$res->fetch_object())
    //         {
    //             $doc .="<tr>";
    //             $doc .="<td>".$row->primeironome."</td>";
    //             $doc .="<td>".$row->funcao."</td>";
    //             $doc .="<td>".$row->email."</td>";
    //             $doc .="<td>".$row->contacto."</td>";
    //             $doc .="</tr>";
    //         }
    // $doc .="</table>";
    use Dompdf\Dompdf;
    require_once '/opt/lampp/htdocs/dompdf/autoload.inc.php';
    $dompdf =new Dompdf();
    $dompdf->load_html($doc);
    $dompdf->set_option('defaultfont','sans');
    $dompdf->setPaper('A4','portrait');
    $dompdf->render();
    $dompdf->stream();
       
?>