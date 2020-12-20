<?
	class Product_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
			if(!$text1)
				$sql="select product.*, gubun.name9 as gubun_name from product left join gubun on product.gubun_no9=gubun.no9 order by name9 limit $start,$limit"; //select문 정의
			else
				$sql="select product.*, gubun.name9 as gubun_name from product left join gubun on 
				product.gubun_no9=gubun.no9 where name9 like '%$text1%' order by name9 limit $start,$limit";
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from product";
			else
				$sql="select * from product where name9 like '%$text1%'";
			
			return $this->db->query($sql)->num_rows(); 
		}

		function getrow($no)
		{
			$sql="select product.*, gubun.name9 as gubun_name from product left join gubun on 
			product.gubun_no9=gubun.no9 where product.no9=$no";
			return $this->db->query($sql)->row();
		}
		function deleterow($no)
		{
			$sql="delete from product where no9=$no";
			return $this->db->query($sql);
		}
		
		function insertrow($row)
		{
			return $this->db->insert("product",$row);
		}
		function updaterow($row,$no)
		{
			$where=array("no9"=>$no);
			return $this->db->update("product",$row,$where);
		}
		function getlist_gubun()
		{
			$sql="select * from gubun order by name9";
			return $this->db->query($sql)->result();
		}
		function cal_jaego()
		{
			$sql="drop table if exists temp;";
			$this->db->query($sql);

			$sql="create table temp(
				no9 int not null auto_increment,
				product_no9 int,
				jaego9 int default 0,
				primary key(no9) );";
				$this->db->query($sql);

				$sql="update product set jaego9=0;";
				$this->db->query($sql);

				$sql="insert into temp (product_no9, jaego9) select product_no9, sum(numi9)-sum(numo9) from jangbu group by product_no9;";
				$this->db->query($sql);

				$sql="update product inner join temp on product.no9=temp.product_no9 set product.jaego9=temp.jaego9;";
				$this->db->query($sql);
		}
	}
?>