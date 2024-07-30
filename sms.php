<?

/*

* Exemplo de uso:

*   include("class.sms.php");

*   $sms = new SMS();

*   // Envia uma mensagem p/um celular da Amazônia 

*   $sms->envia("amazonia", "96", "99714321", "Fulano", "Teste do PHP-SMS", $resposta);

*   echo "$resposta<br>\n";

*/

class SMS {

  // Vetor com as mensagens de erro padrão que serão exibidas.   

  var $vresposta;

  var $HTTPHead;

  var $HTTPBody;

 

  /**

   * SMS::SMS()

   *   Construtor da Classe.

   */

  function SMS() {

    // Inicializa o vetor com as mensagens de erro padrão

    $this->vresposta['manutencao'] = "Não foi possível enviar a mensagem pois o sistema encontra-se em manutenção.";

    $this->vresposta['naoassinante'] = "Não foi possível enviar a mensagem pois o destinatário não está habilitado para receber mensagens da Internet.";

    $this->vresposta['desconhecido'] = "Não foi possível enviar a mensagem.";

    $this->vresposta['repetido'] = "Erro: Mensagem já enviada anteriormente.";

    $this->vresposta['sucesso'] = "Mensagem enviada com sucesso!";

  } 

  /**

   * SMS::envia()

   *   Método que envia mensagem. Conforme a operadora, chama o método apropriado.

   *   Retorna verdadeiro caso envie a mensagem com sucesso, ou falso, caso contrário.

   * @param $operadora Código da operadora, 1 para Amazonia Celular e 2 para NBT

   * @param $ddd Código de área para o DDD, sem o zero no início.

   * @param $fone Número do Celular de destino

   * @param $nome Nome do remetente

   * @param $msg Mensagem a ser enviada

   * @param $reposta Mensagem de retorno da função

   * @return Booleano que indica se a mensagem pôde ou não ser enviada.

   */

  function envia($operadora, $ddd, $fone, $nome, $msg, &$resposta) {

    if (!eregi('^[0-9]{2}$', $ddd)) {

      $resposta = "Número DDD inválido!";

      return false;

    }

    if (!eregi('^[0-9]{8}$', $fone)) {

      $resposta = "Número de telefone inválido!";

      return false;

    }

    if (trim($msg) == '') {

      $resposta = "Mensagem vazia!";

      return false;

    }   

    if ($operadora == "amazonia" || $operadora == "telemig") {

      return $this->_enviaAmazoniaTelemig($ddd, $fone, $nome, $msg, $resposta, $operadora);

    } elseif ($operadora == "nbt" || $operadora == "tco") {

      return $this->_enviaNBTTCO($ddd, $fone, $nome, $msg, $resposta);

    } elseif ($operadora == "oi") {

      return $this->_enviaOi($ddd, $fone, $nome, $msg, $resposta);

    } elseif ($operadora == "tess") {

      return $this->_enviaTess($ddd, $fone, $nome, $msg, $resposta);         

    } else {

      $resposta = "Erro: Operadora desconhecida.";

      return false;

    }

  }

  function _enviaAmazoniaTelemig($ddd, $fone, $nome, $msg, &$mensagem, $operadora) {

    if ($operadora == "amazonia") $cod_op = 2;

    elseif ($operadora == "telemig") $cod_op = 1;

    // Monta o vetor com os mesmos elementos do formulário de

    // envio de mensagens da página da Amazônia/Telemig Celular.   

    $postData = array("operadora" => $cod_op, // 1 = Telemig, 2 = Amazonia

                      "servico" => "3", // Valor fixo p/a Amazonia

                      "totalChars" => 0,

                      "msg_total" => "",

                      "Tel_Orig" => "",

                      "DDD" => $ddd,

                      "Tel_Dest" => $fone,

                      "Nome_Orig" => $nome,

                      "Mensagem" => $msg,

                      "Image" => "Submit" // Valor fixo p/a Amazonia

                     );

    // Chama o método que faz a requisição HTTP de POST, e obtem a resposta do servidor.

    // A resposta desse método é um vetor de duas posições, onde a primeira é o cabeçalho

    // HTTP e a segunda é o corpo da página

    $this->_http("http://wa16.waura.com.br/cgi-bin/waura.exe", "POST", "", $postData);   

   

    // Elimina as tags e os retornos de linha do texto da página HTML

    $resposta = str_replace("\r\n", "", strip_tags(trim($this->HTTPBody)));

    // Verifica se existe a string de confirmção de envio da mensagem no texto da página de resposta

    if (!eregi("sua mensagem foi encaminhada", $resposta)) {

      // Verifica qual foi a mensagem de erro da página

      if (eregi('manutenção', $resposta)) {

        $mensagem = $this->vresposta['manutencao'];

        return false;

      } elseif (eregi('não é um assinante', $resposta)) {

        $mensagem = $this->vresposta['naoassinante'];

        return false;

      } else {

        $mensagem = $this->vresposta['desconhecido'];

        return false;

      }

    } else {

      $resposta = $this->vresposta['sucesso'];

      return true;

    }

  }

 

  function _enviaOi($ddd, $fone, $nome, $msg, &$mensagem) {

    $postData = array(//"sms" => "ok",   

                      "urlfrom" => "/portal2/site/planos_e_servicos/oi_torpedo.jsp",

                      "ddd" => $ddd,

                      "numero" => $fone,

                      "texto" => $msg

                     );

    $this->_http("http://www.oi.com.br/portal2/site/oipessoal/send_sms.jsp", "POST", "", $postData);

    $resposta = str_replace("\r\n", "", strip_tags(trim($this->HTTPBody)));   

    // Verifica se existe a string de confirmção de envio da mensagem no texto da página de resposta

    if (!eregi("sua mensagem foi enviada com sucesso", $resposta)) {

      $mensagem = $this->vresposta['desconhecido'];

      return false;   

    } else {

      $mensagem = $this->vresposta['sucesso'];

      return true;

    }

  } 

  function _enviaNBTTCO($ddd, $fone, $nome, $msg, &$mensagem) {

    $postData = array("co_ddd" => $ddd,

                      "nu_celular" => $fone,

                      "ds_mensagem1" => $msg,

                      "nu_caracteres" => 50,

                      "no_origem" => $nome,

                      "nu_origem" => "",

                      "ds_email_confirma" => "",

                      "co_ddd_confirma" => "",

                      "nu_celular_confirma" => "",

                      "autorizacao" => "",

                      "Submit2" => "Enviar &raquo;"

                     );

    // Para a NBT é preciso fazer duas requisições, a primeira é somente para poder obter o

    // cookie com o identificador da sessão.

    $this->_http("http://www.tco.net.br/ecelular/homeecelular.asp");

    //$this->_gravaArq($this->HTTPBody, "conteudo.txt");

    //$this->_p($this->HTTPHead);

    $vcookie = $this->_pegaCookie($this->HTTPHead);

    //$this->_v($vcookie);

    $this->_http("http://www.tco.net.br/ecelular/homeecelular.asp", "POST", "Referer: http://www.tco.net.br/ecelular/homeecelula...r\nCookie: {$vcookie[1]}={$vcookie[2]}\r\n", $postData);

    $resposta = str_replace("\r\n", "", strip_tags(trim($this->HTTPBody)));

    if (!eregi("mensagem processada", $resposta)) {

      if (eregi('manutenção', $resposta)) {

        $mensagem = $this->vresposta['manutencao];

        return false;

      } elseif (eregi('não está cadastrado', $resposta)) {

        $mensagem = $this->vresposta['naoassinante'];

        return false;

      } elseif (eregi('mensagem já enviada', $resposta)) {

        $mensagem = $this->vresposta['repetido'];

        return false;

      } else {

        $mensagem = $this->vresposta['desconhecido'];

        return false;

      }

    } else {

      $mensagem = $this->vresposta['sucesso'];

      return true;

    }

  }

 

  function _enviaTess($ddd, $fone, $nome, $msg, &$mensagem) {

    $postData = array("DDD" => $ddd,

                      "Celular" => $fone,

                      "Mensagem" => $msg,

                      "SeuNome" => $nome,

                      "SeuDDD" => "",

                      "SeuTelefone" => "",

                      "submit" => "Enviar"

                     );   

    $this->_http("http://www.e-tess.com.br/smsweb/smsSubmitTess.asp", "POST", "Referer: http://www.tess.com.br/clientes/home/\r\n", $postData);

    $resposta = str_replace("\r\n", "", strip_tags(trim($this->HTTPBody)));

    if (!eregi("enviada com sucesso", $resposta)) {

      $mensagem = $this->vresposta['desconhecido];

      return false;

    } else {

      $mensagem = $this->vresposta['sucesso'];

      return true;

    } 

  }

 

  /**

   * SMS::_http()

   *   Método que implementa uma requisição HTTP. 

   *   Para mais detalhes, visite o site do autor

   *   da função, em http://www.spencernetwork.org/memo/tips-3.php 

   * 

   * @param $url Endereço da página que está sendo requisitada.

   * @param $method Método HTTP da requisição (GET, POST, etc)

   * @param $headers Headers adicionais da requisição (opcional)

   * @param $post Vetor com as variáveis, e seus valores, que serão

   *              submetidas, caso o método seja POST.

   * @return Retorna um vetor com duas posições com a resposta da

   *         requisição, onde a primeira posição é o Header HTTP

   *         e a segunda é o texto da página requisitada.

   */

  function _http($url, $method="GET", $headers="", $post=array("")) {

    // Separa as partes da URL

    $URL = parse_url($url);

    if (isset($URL['query])) {

      $URL['query'] = "?".$URL['query'];

    } else {

      $URL['query'] = "";

    }

    // Verifica se foi informado a porta. Se não, atribui a porta padrão HTTP (80)

    if (!isset($URL['port'])) $URL['port'] = 80;

    // Começa a montar a string com a requisição HTTP

    $request  = $method." ".$URL['path'].$URL['query']." HTTP/1.0\r\n";

    $request .= "Host: ".$URL['host']."\r\n";

    $request .= "User-Agent: PHP/".phpversion()."\r\n";

    if (isset($URL['user']) && isset($URL['pass'])) {

      $request .= "Authorization: Basic " . base64_encode($URL['user'] . ":" . $URL['pass']) . "\r\n";

    }

    $request .= $headers;

    // Se o método da requisição for POST, acrescenta à requisição os elementos do

    // vetor ($postdata) com os as variáveis e seus valores, passado como parâmetro para o método.

    if (strtoupper($method) == "POST") {

      while (list($name, $value) = each($post)) {

        $POST[] = $name . "= . urlencode($value);

      }

      $postdata = implode("&", $POST);

      $request .= "Content-Type: application/x-www-form-urlencoded\r\n";

      $request .= "Content-Length: " . strlen($postdata) . "\r\n";

      $request .= "\r\n";

      $request .= $postdata;

    } else {

      $request .= "\r\n";

    }

    // Abre uma conexão com o host especificado

    $fp = fsockopen($URL['host], $URL['port']);

    if (!$fp) {

      die("Não foi possível estabelecer uma conexão com o servidor.\n");

    }   

   

    //$this->_p($request);

    // Submete a requisição

    fputs($fp, $request);

    $response = "";

    while (!feof($fp)) {

      $response .= fgets($fp, 4096);

    }

    fclose($fp);

    $DATA = split("\r\n\r\n", $response, 2);

    $this->HTTPHead = $DATA[0];

    $this->HTTPBody = $DATA[1];   

    return $DATA;

  }

  function _pegaCookie($head) {

    $head = str_replace("\r\n", "", $head);

    eregi('Set-Cookie: ([a-z]+)=([a-z]+);', $head, $vcookie);

    return $vcookie;

  }

  function _v($v) {

    echo "<pre>";

    print_r($v);

    echo "</pre>";

  }

  function _p($s) {

    echo "<pre>$s</pre>";

  } 

 

  function _gravaArq($texto, $caminhoArq) {

    if (!is_file($caminhoArq)) {

      return false;

    }

    $parq = fopen($caminhoArq, 'a+'); 

    fwrite($parq, "$texto\r\n");

    fclose($parq);

  }

 

}

?>