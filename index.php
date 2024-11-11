<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>CLAVEM</h1>
    <p>Real Estate Platform for Property Listing and Management</p>
  	<div id="primary">
   	<div class="container">
      	<div class="searchwrap">
					<input type="text" name="s" class="input">
					<button class="searchbtn" type="submit">Search</button>
				</form>
      	</div>
      	<div class="collapse" id="primarymenu-collapse">
        		<div class="navmenu">
					<ul>
						<li><a href="http://localhost:3000/index.php">Home</a></li>
						<li><a href="http://localhost:3000/About.php">About Us</a></li>
						<li><a href="http://localhost:3000/Contact.php">Contact Us</a></li>
											</ul>
        		</div>
      	</div>
    	</div>
  	</div>
      <div id="home-filtering">
   <div class="container">
      <div class="col-md-7">
        	<div class="tab-content" id="homefitering-fields">
          	<div class="tab-pane active" role="tabpanel" id="realestate-sale">
            	<h3>FIND PROPERTIES FOR SALE</h3>
            	<form method="POST" action="http://localhost:3000/Search.php" accept-charset="UTF-8" id="frm-sale" class="form-horizontal"><input name="_token" type="hidden" value="K3LZ2Xbfhd8Cu2gzBJmVfS2rcaem8T7IVnQ71AjU">
              		<div class="form-group">
	                	<label class="col-sm-4 col-xs-4 control-label">Category</label>
							<div class="col-sm-6 col-xs-7">
								<select class="form-control" id="category_id" name="category_id"><option value="" selected="selected">Please Select</option>
                                    <option value="1">Apartment</option>
                                    <option value="2">Building</option>
                                    <option value="11">Commercial Space</option>
                                    <option value="3">Condominium</option>
                                    <option value="4">House &amp; Lot</option>
                                    <option value="9">Lot w/ Unfinished Structure</option>
                                    <option value="10">Lot with Structure</option>
                                    <option value="8">Others</option>
                                    <option value="5">Townhouse</option>
                                    <option value="6">Vacant Lot</option>
                                    <option value="7">Warehouse</option></select>
							</div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-4 col-xs-4 control-label">Location</label>
							<div class="col-sm-6 col-xs-7">
								<select class="form-control" id="location" name="location"><option value="" selected="selected">Please Select</option><optgroup label="-- Lipa City --">
                                    <option value="0|1">Adya</option>
                                    <option value="0|2">Anilao</option>
                                    <option value="0|3">Anilao - Labac</option>
                                    <option value="0|4">Antipolo Del Norte</option>
                                    <option value="0|5">Antipolo Del Sur</option>
                                    <option value="0|6">Bagoong Pook</option>
                                    <option value="0|7">Banay Banay</option>
                                    <option value="0|8">Barangay 12</option>
                                    <option value="0|262">Bolbok</option>
                                    <option value="0|9">Bugtong na pulo</option>
                                    <option value="0|10">Bulacnin</option>
                                    <option value="0|11">Bulaklakan</option>
                                    <option value="0|260">Calamias</option>
                                    <option value="0|12">Cumba</option>
                                    <option value="0|13">Dagatan</option>
                                    <option value="0|14">Duhatan</option>
                                    <option value="0|15">Halang</option>
                                    <option value="1|20">Inosloban</option>
                                    <option value="1|8">Kayumanggi</option>
                                    <option value="1|14">Latag</option>
                                    <option value="1|2">LodLod</option>
                                    <option value="1|9">Lumbang</option>
                                    <option value="1|6">Mabini</option>
                                    <option value="1|21">Malagonlong</option>
                                    <option value="1|22">Malitlit</option>
                                    <option value="1|15">Marauoy</option>
                                    <option value="1|47">Mataas na Lupa</option>
                                    <option value="1|3">Munting Pulo</option>
                                    <option value="1|52">Pagolingin Bata</option>
                                    <option value="1|7">Pagolingin East</option>
                                    <option value="1|4">Pagolingin West</option>
                                    <option value="1|16">Pagolingin North</option>
                                    <option value="1|46">Pangao</option>
                                    <option value="1|10">Pinagkawitan</option>
                                    <option value="1|19">Pinagtongulan</option>
                                    <option value="1|11">Plaridel</option>
                                    <option value="1|5">Poblacion Barangay 1</option>
                                    <option value="1|17">Poblacion Barangay 2</option>
                                    <option value="1|45">Poblacion Barangay 3</option>
                                    <option value="1|18">Poblacion Barangay 4</option>
                                    <option value="1|48">Poblacion Barangay 5</option> 
                                    <option value="1|12">Poblacion Barangay 6</option>
                                    <option value="1|13">Poblacion Barangay 7</option>
                                    <option value="2|23">Poblacion Barangay 8</option>
                                    <option value="2|49">Poblacion Barangay 9</option>
                                    <option value="2|28">Poblacion Barangay 10</option>
                                    <option value="2|24">Poblacion Barangay 11</option>
                                    <option value="2|29">Poblacion Barangay 9-A</option>
                                    <option value="2|25">Pusil</option>
                                    <option value="2|26">Quezon</option>
                                    <option value="2|31">Rizal</option>
                                    <option value="2|27">Sabang</option>
                                    <option value="2|30">Sampaguita</option>
                                    <option value="2|32">San Benito</option>
                                    <option value="3|43">San Carlos</option>
                                    <option value="3|35">San Celestino</option>
                                    <option value="3|44">San Francisco</option>
                                    <option value="3|50">San Guillermo</option>
                                    <option value="3|39">San Jose</option>
                                    <option value="3|40">San Lucas</option>
                                    <option value="3|36">San Salvador</option>
                                    <option value="3|33">San Sebastian(Balagbag)</option>
                                    <option value="3|37">Sto. Niño</option>
                                    <option value="3|38">Sto. Toribio</option>
                                    <option value="3|41">Sapac</option>
                                    <option value="3|42">Sico</option>
                                    <option value="3|51">Talisay</option>
                                    <option value="3|34">Tambo</option>
                                    <option value="3|35">Tangob</option>
                                    <option value="3|36">Tanguay</option>
                                    <option value="3|37">Tibig</option>
                                    <option value="3|38">Tipacan</option>
                                </optgroup></select>
							</div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-4 col-xs-4 control-label">Lot Area (sqm.)</label>
							<div class="col-sm-6 col-xs-7">
								<select class="form-control" id="lot_area" name="lot_area">
                                    <option value="" selected="selected">Please Select</option>
                                    <option value="0-250">1 sqm to 250 sqm</option>
                                    <option value="251-500">251 sqm to 500 sqm</option>
                                    <option value="501-750">501 sqm to 750 sqm</option>
                                    <option value="751-1000">751 sqm to 1,000 sqm</option>
                                    <option value="1001-1500">1,001 sqm to 1,500 sqm</option>
                                    <option value="1501-2500">1,501 sqm to 2,500 sqm</option>
                                    <option value="2501-1000000">2,501 sqm and above</option></select>
							</div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-4 col-xs-4 control-label">Floor Area (sqm.)</label>
							<div class="col-sm-6 col-xs-7">
								<select class="form-control" id="floor_area" name="floor_area">
                                    <option value="" selected="selected">Please Select</option>
                                    <option value="0-250">1 sqm to 250 sqm</option>
                                    <option value="251-500">251 sqm to 500 sqm</option>
                                    <option value="501-750">501 sqm to 750 sqm</option>
                                    <option value="751-1000">751 sqm to 1,000 sqm</option>
                                    <option value="1001-1500">1,001 sqm to 1,500 sqm</option>
                                    <option value="1501-2500">1,501 sqm to 2,500 sqm</option>
                                    <option value="2501-1000000">2,501 sqm and above</option>
                                </select>
							</div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-4 col-xs-4 control-label">Price Range</label>
							<div class="col-sm-6 col-xs-7">
								<select class="form-control" id="price" name="price">
                                    <option value="" selected="selected">Please Select</option>
                                    <option value="1-500000">PHP 1 to PHP 500,000</option>
                                    <option value="50001-1000000">PHP 500,001 to PHP 1,000,000</option>
                                    <option value="1000001-5000000">PHP 1,000,001 to PHP 5,000,000</option>
                                    <option value="5000001-10000000">PHP 5,000,001 to PHP 10,000,000</option>
                                    <option value="10000001-15000000">PHP 10,000,001 to PHP 15,000,000</option>
                                    <option value="15000001-20000000">PHP 15,000,001 to PHP 20,000,000</option>
                                    <option value="20000001-50000000">PHP 20,000,001 to PHP 50,000,000</option>
                                    <option value="50000001-above">PHP 50,000,001 and above</option></select>
							</div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-4 col-xs-4 control-label">Property Classification</label>
							<div class="col-sm-6 col-xs-7">
								<select class="form-control" id="ropa_class" name="ropa_class">
                                    <option value="" selected="selected">Please Select</option><option value="1">Green Tag (in possession, with complete property documents)</option><option value="2">Yellow Tag (with special concerns either on title, tax declaration, possession, or other property documents)</option><option value="3">Red Tag (with pending court case/s - under litigation. Interested party is directed to verify status of the case from the court/s.)</option></select>
							</div>
	              	</div>
