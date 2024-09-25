<?php


class Database{

  public static function connect(string $localhost,string $root, $password,string $databaseName)
  {
    $connection = mysqli_connect($localhost, $root, $password, $databaseName);
    if (!$connection) {
      die("Database connection failed: " . mysqli_connect_error());
    }
    return $connection;
  }

  public static function create($createName ,$name, $data = [])
  {
    $name = addslashes($name);
    if($createName == "database")
    {
      return "CREATE DATABASE `$name`";
    }elseif($createName == "table")
    {
      $columns = [];
      foreach($data as $column => $definition)
      {
        $columns[] = "`$column` $definition";
      }
      $columns = implode(", ", $columns);
      return "CREATE TABLE $name (`$columns`)";
    }else{
      return "Invalid create type. Only table or database are allowed.";
    }
  }

  public static function insert($tableName, $columns, $values)
  {
      $columns = implode("`, `", $columns);
      $values = implode("', '", $values);
      return "INSERT INTO $tableName (`$columns`) VALUES ('$values')";
  }
  

  public static function select($columns, $tableName, $some_column = "", $some_value = "")
  {
    if($columns != "*")
    {
      $columns = implode("`, `", $columns);
      $columns = "`$columns`";
    }
    if(empty($some_column) && empty($some_value))
    {
      return "SELECT $columns FROM $tableName";
    }else{
      $some_value = is_numeric($some_value) ? $some_value : "'$some_value'";
      return "SELECT $columns FROM $tableName WHERE `$some_column` =  $some_value";
    }
  }

  public static function selectJoin($columns, $tableName, $join_table = "", $join_condition = "", $some_column = "", $some_value = "")
  {
      // Prepare the columns
      if ($columns != "*") {
          $columns = implode(", ", (array)$columns);
      }
  
      // Start building the SQL query
      $sql = "SELECT $columns FROM $tableName";
  
      // Add JOIN clause if provided
      if (!empty($join_table) && !empty($join_condition)) {
          $sql .= " JOIN $join_table ON $join_condition";
      }
      
      // Add WHERE clause if provided
      if (!empty($some_column) && !empty($some_value)) {
          $some_value = is_numeric($some_value) ? $some_value : "'" . mysqli_real_escape_string(Database::connect("localhost", "root", "", "drophut"), $some_value) . "'";
          $sql .= " WHERE $some_column = $some_value";
      }
  
      return $sql;
  }
  
  public static function delete($tableName, $some_column = "", $some_value = "")
  {
    if(empty($some_column) && empty($some_value))
    {
      return "DELETE FROM $tableName";
    }else{
      $some_value = is_numeric($some_value) ? $some_value : "'$some_value'";
      return "DELETE FROM `$tableName` WHERE `$some_column` = $some_value";
    }
  }

  public static function update($tableName, $data = [], $some_column = "", $some_value = "")
  {
    $update_data = [];
    foreach($data as $column => $value)
    {
      $escaped_value = addslashes($value);
      $update_data[] = "`$column` = '$escaped_value'";
    }
    $final_data = implode(", ", $update_data);
    if(empty($some_column) && empty($some_value))
    {
      return "UPDATE `$tableName` SET $final_data";
    }else{
      return "UPDATE `$tableName` SET $final_data WHERE `$some_column` = '$some_value'";
    }
  }

  public static function drop($dropName, $input)
  {
    if (empty($input)) {
      return "Input cannot be empty.";
    }
    $input = addslashes($input);
    if($dropName == "table"){
      return "DROP TABLE `$input`";
    }elseif($dropName == "database"){
      return "DROP DATABASE `$input`";
    }else{
      return "Invalid drop type. Only table or database are allowed.";
    }
  }

  public function alter($table, $action, $details = []) {
    $sql = "";
    switch ($action) {
        case 'add_column':
            $sql = "ALTER TABLE $table ADD COLUMN {$details['name']} {$details['type']}";
            if (isset($details['default'])) {
                $sql .= " DEFAULT '{$details['default']}'";
            }
            break;

        case 'drop_column':
            $sql = "ALTER TABLE $table DROP COLUMN {$details['name']}";
            break;

        case 'modify_column':
            $sql = "ALTER TABLE $table MODIFY COLUMN {$details['name']} {$details['type']}";
            if (isset($details['null'])) {
                $sql .= $details['null'] ? " NULL" : " NOT NULL";
            }
            if (isset($details['default'])) {
                $sql .= " DEFAULT '{$details['default']}'";
            }
            break;

        case 'rename_column':
            $sql = "ALTER TABLE $table RENAME COLUMN {$details['old_name']} TO {$details['new_name']}";
            break;

        case 'rename_table':
            $sql = "ALTER TABLE $table RENAME TO {$details['new_name']}";
            break;

        case 'add_constraint':
            $sql = "ALTER TABLE $table ADD CONSTRAINT {$details['name']} {$details['constraint']}";
            break;

        case 'drop_constraint':
            $sql = "ALTER TABLE $table DROP CONSTRAINT {$details['name']}";
            break;

        case 'set_nullability':
            $sql = "ALTER TABLE $table MODIFY COLUMN {$details['name']} {$details['type']}";
            $sql .= $details['null'] ? " NULL" : " NOT NULL";
            break;

        case 'add_column_with_default':
            $sql = "ALTER TABLE $table ADD COLUMN {$details['name']} {$details['type']}";
            if (isset($details['default'])) {
              $sql .= " DEFAULT '{$details['default']}'";
          }
            break;

        case 'change_default':
            $sql = "ALTER TABLE $table ALTER COLUMN {$details['name']} SET ";
            if (isset($details['default'])) {
              $sql .= " DEFAULT '{$details['default']}'";
          }
            break;

        case 'drop_default':
            $sql = "ALTER TABLE $table ALTER COLUMN {$details['name']} DROP DEFAULT";
            break;

        default:
            return "Unsupported action: $action";
    }
}
}