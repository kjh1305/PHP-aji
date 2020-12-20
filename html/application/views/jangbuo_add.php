<br>
		 <div class="alert mycolor1" role="alert">매출장</div> <!-- 제목 -->
<script>
				
				$(function() {
					$("#writeday") .datetimepicker({
						locale: 'ko',
						format: 'YYYY-MM-DD',
						defaultDate: moment()
					});
				});
				
				function select_product()
				{
					var str;
					str = form1.sel_product_no.value;
					if(str=="")
					{
						form1.product_no.value="";
						form1.price.value="";
						form1.prices.value="";
					}
					else
					{
						str=str.split("^^");
						form1.product_no.value=str[0];
						form1.price.value=str[1];
						form1.prrices.value=Number(form1.price.value)*Number(form1.numo.value);
					}
				}

				function cal_prices()
				{
					form1.prices.value=Number(form1.price.value)*Number(form1.numo.value);
					form1.bigo.focus();
				}

				function find_product()
				{
					window.open("/~sale9/findproduct","","resizable=yes,scrollbars=yes,width=400,height=600");
				}
				
			</script>
		<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
	
<table class="table table-bordered table-sm mymargin5">
<tr>
		<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 날짜
		</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<div class="input-group input-group-sm date" id="writeday">
						<input  type="text" name="writeday" value="<?=set_value("writeday");?>"
								class="form-control form-control-sm">	
							<div class="input-group-append">
								<div class="input-group-addon">
								&nbsp 	<i class="far fa-calendar-alt fa-lg"></i>
								</div>
							</div>
					</div>
						 <?if(form_error("writeday")==true) echo form_error("writeday");?>
				</div>
			</td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 제품명</td>
		<td width="80%" align="left">
			<div class="form-inline">
			<input type="hidden" name="product_no" value="<?=set_value("product_no");?>">
			<input type="text" name="product_name" value="" class="form-control from-control-sm" disabled> &nbsp
			<input type="button" value="제품찾기" onClick="find_product();" class="btn btn-sm mycolor1">
			</div>
						<?if(form_error("product_no")==TRUE) echo form_error("product_no");?>
		</td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        단가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="price" value=""
                         class="form-control form-control-sm" size="20" maxlength="20"  onChange='cal_prices();'>
						 
						
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        수량
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="numo" value=""
                         class="form-control form-control-sm" size="20" maxlength="20"  onChange='cal_prices();'>
						 
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         금액
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="prices" value=""
                         class="form-control form-control-sm" size="20" maxlength="20" disabled>
						
        </div>
    </td>
</tr>

<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         비고
    </td>
	 <td width="80%" align="left">
		<div class="form-inline">
			 <input type="text" name="bigo" value="" class="form-control form-control-sm" size="20" maxlength="20">
		 </div>	 
    </td>
</tr>

<tr>

</table>

	<div align="center">
		<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
