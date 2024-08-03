<?php
	class mypdo extends PDO{

		private $_dsn    = "mysql:host=localhost;dbname=water1.0";
		private $_user   = 'root';
		private $_passwd = 'Yejiching8';
		private $_encode = 'utf8';
		private $_stmt;
		private $_data   = [];
		

		# 連線建構式
		function __construct(){ 
			try{
				// 使用父類的建構式
				parent::__construct($this->_dsn,$this->_user,$this->_passwd);
				$this->_setEncode();
			}catch(PDOException $e){
				print_r($e);
			}
			
		}

		# 設定私有屬性值
		function __set($name, $value){
			$this->_data[$name] = $value;
		}
		
		# 得到私有屬性值
		function __get($name){
			if(isset($this->_data[$name])){
				return $this->_data[$name];
			}
			return false;
		}
		
		# 設立編碼
		private function _setEncode(){
			$this->query("SET NAMES '{$this->_encode}'");
		}
		
		# 將命名參數(:name)和數值(value)綁定
		private function _bind($bind){
			foreach ($bind as $key =>$value){
				$this->_stmt->bindValue($key, $value, is_numeric($value)?PDO::PARAM_INT:PDO::PARAM_STR);
			}	
		}

		# 執行sql查詢
		function bindQuery($sql, array $bind = []){
			$this->_stmt = $this->prepare($sql);
			$this->_bind($bind);
			$this->_stmt->execute();
			return $this->_stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
		
		# 錯誤代碼顯示
		function error(){
			$error = $this->_stmt->errorInfo();
			echo 'errorCode:'.$error[0].'<br>';
			echo 'errorString:'.$error[2];
		}
		
		
		# 插入資料
		function insert($table, array $param = []){
			// 把屬性名稱取出來
			$columns   = array_keys($param);
			// 參數前處理，利用key建立命名參數並與value建立對應關係
			$values    = [];
			$bind_data = [];
			foreach($param as $key => $value){
				// 將:key存到陣列
				$values []= ":{$key}";
				// 把:key當作key, 並存入對應值
				$bind_data [":{$key}"] = $value;
			}
			// 合成sql語法
			$sql = "INSERT INTO {$table} (" .implode(',', $columns) .") VALUES ( ".implode(',', $values) .")";
			// 預處理，凍結SQL語句結構
			$this->_stmt = $this->prepare($sql);
			// 將:key和value綁定
			$this->_bind($bind_data);
			// 執行sql
			$this->_stmt->execute();
		}
		
		
	}
?>