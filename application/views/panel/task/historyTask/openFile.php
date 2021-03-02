<?php 
	$lokasi2 = my_simple_crypt($lokasi,'d');
	$file = base_url($lokasi2); 

	$p = parse_url($file);
	$filename = $p['path'];

	// header('Content-Type: application/pdf');
 //    // header('Content-Disposition: attachment; filename="' . $filename . '"');
 //    header('Content-Transfer-Encoding: binary');
 //    header('Accept-Ranges: bytes');
 //    header("Content-Length: " . filesize($file)); 

	// readfile($file); 
?>  

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- fitness target -->
      <!-- Column selectors table -->
      <section id="column-selectors">
      	<div class="row">
      		<div class="col-12">
      			<div class="card">
      				<div class="card-header">
      					<h4 class="card-title"><?php echo $file?></h4>