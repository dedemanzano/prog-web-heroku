<?php 
require_once(__DIR__ . '/../model/Fornecedores.php');
require_once(__DIR__ . '/../db/Db.php');

// Classe para persistencia de Fornecedores 
// DAO - Data Access Object
class DaoFornecedores {
    
  private $connection;

  public function __construct(Db $connection) {
      $this->connection = $connection;
  }
  
  public function porId(int $id): ?Fornecedores {
    $sql = "SELECT empresa, tipoenvio, cidade, id_fornecedores, contato FROM departamentos where id_fornecedores = ?";
    $stmt = $this->connection->prepare($sql);
    $forn = null;
    if ($stmt) {
      $stmt->bind_param('i',$id);
      if ($stmt->execute()) {
        $empresa = ''; $tipoenvio = ''; $cidade = ''; $id_fornecedores = 0; $contato = ''; 
        $stmt->bind_result($empresa,$tipoenvio,$cidade,$id_fornecedores,$contato);
        $stmt->store_result();
        if ($stmt->num_rows == 1 && $stmt->fetch()) {
          $forn = new Fornecedores($empresa, $tipoenvio, $cidade, $id_fornecedores, $contato);
        }
      }
      $stmt->close();
    }
    return $forn;
  }

  public function inserir(Fornecedores $fornecedores): bool {
    $sql = "INSERT INTO fornecedores (empresa,tipoenvio,cidade,id_fornecedores,contato) VALUES(?,?,?,?,?)";
    $stmt = $this->connection->prepare($sql);
    $res = false;
    if ($stmt) {
      $empresa = $fornecedores->getEmpresa();
      $tipoenvio = $fornecedores->getTipoenvio();
      $cidade = $fornecedores->getCidade();
      $id_fornecedores = $fornecedores->getId_fornecedores();
      $contato = $fornecedores->getContato();
      $stmt->bind_param('sssss', $empresa,$tipoenvio,$cidade,$id_fornecedores,$contato);
      if ($stmt->execute()) {
          $id = $this->connection->getLastID();
          $fornecedores->setId($id);
          $res = true;
      }
      $stmt->close();
    }
    return $res;
  }

  public function remover(Fornecedores $fornecedores): bool {
    $sql = "DELETE FROM fornecedores where id=?";
    $id = $fornecedores->getId(); 
    $stmt = $this->connection->prepare($sql);
    $ret = false;
    if ($stmt) {
      $stmt->bind_param('i',$id);
      $ret = $stmt->execute();
      $stmt->close();
    }
    return $ret;
  }

  public function atualizar(Fornecedores $fornecedores): bool {
    $sql = "UPDATE fornecedores SET empresa=?, tipoenvio=?, cidade=?, id_fornecedores=?, contato=?  WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $ret = false;      
    if ($stmt) {
     $empresa = $fornecedores->getEmpresa();
      $tipoenvio = $fornecedores->getTipoenvio();
      $cidade = $fornecedores->getCidade();
      $id_fornecedores = $fornecedores->getId_fornecedores();
      $contato = $fornecedores->getContato();
      $stmt->bind_param('sssss', $empresa,$tipoenvio,$cidade,$id_fornecedores,$contato);
      $ret = $stmt->execute();
      $stmt->close();
    }
    return $ret;
  }

  
  public function todos(): array {
    $sql = "SELECT empresa, tipoenvio, cidade, id_fornecedores, contato FROM departamentos where id = ?";
    $stmt = $this->connection->prepare($sql);
    $fornecedores = [];
    if ($stmt) {
      if ($stmt->execute()) {
        $empresa = ''; $tipoenvio = ''; $cidade = ''; $id_fornecedores = 0; $contato = ''; 
        $stmt->bind_result($empresa,$tipoenvio,$cidade,$id_fornecedores,$contato);
        $stmt->store_result();
        while($stmt->fetch()) {
          $fornecedores[] = new Fornecedores($empresa, $tipoenvio, $cidade, $id_fornecedores, $contato);
        }
      }
      $stmt->close();
    }
    return $fornecedores;
  }

};

