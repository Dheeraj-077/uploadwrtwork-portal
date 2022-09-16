<form role="form" id="my-awesome-dropzone" class="dropzone" method="POST" action="./file_upload.php" enctype="multipart/form-data">
   <div class="form-group">
      <label for="job_title">Job Title</label>
      <input class="form-control" name="job_title" id="job_title" value="">
   </div>
   <div class="form-group mt-3">
      <label for="po_no">PO#</label>
      <input class="form-control" name="po_no" id="po_no" maxlength="15" value="">
   </div>
   <div class="form-group mt-3">
      <label for="job_type">Job Type *</label>
      <select class="form-control" name="job_type" id="job_type" required>
         <option value="" selected disabled>Select Job Type</option>
         <?php
            include_once ('../config.php');
            $records = mysqli_query($mysqli, "SELECT * FROM addjobtype");
            while($data = mysqli_fetch_array($records))
            {
                  echo "<option value='". $data['jobtype'] ."'>" .$data['jobtype']." ".'$'.$data['pricing']  ."</option>";
            }	
         ?> 
      </select>
   </div>
   <!-- <div class="form-group mt-3" id="select_size" hidden>
      <label for="dimensions">Select Size</label>
      <select class="form-control" name="dimensions" id="dimensions">
         <option  value="Left Chest">Left Chest</option>
         <option  value="Cap">Cap</option>
         <option  value="Full Back">Full Back</option>
         <option  value="custom">Custom</option>
      </select>
   </div>
   <div class="form-group mt-3 row" id="size_box" hidden	>
      <div class="col-md-5">
         <input type="text" name="size_width" class="form-control" id="width" value="" placeholder="Width">
      </div>
      <div class="col-md-2 text-center">
         <b>X</b>
      </div>
      <div class="col-md-5">
         <input type="text" name="size_height" class="form-control" id="height" value="" placeholder="Height">
      </div>
   </div> -->
   <!-- For Virtual Proof -->
   <!-- <div class="form-group" id="virtual_proof_type" hidden>
      <div class="form-group">
         <label for="imprint_area_val">What is the imprint area? (note: width and height or wrap etc)</label>
         <input type="text" class="form-control" name="imprint_area_val" id="imprint_area_val">
      </div>
      <div class="form-group">
         <label class="tip" style="border-bottom: 1px dotted black;">
         Is bleed required?
         </label>
         <div>
            <input type="radio" name="bleed_req_val" value="1">&nbsp;<label for="">Yes</label>&nbsp;
            <input type="radio" name="bleed_req_val" value="0" checked>&nbsp;<label for="">No</label>
         </div>
      </div>
      <div class="form-group">
         <label for="temp_file_link">Please include a link to the template file, if not included in upload.</label>
         <input type="text" class="form-control" name="temp_file_link" id="temp_file_link">
      </div>
   </div> -->
   <!-- For Virtual Samples -->
   <!-- <div class="form-group" id="virtual_sample_type" hidden>
      <div class="form-group">
         <label for="product_col_val">What is the product color?</label>
         <input type="text" class="form-control" name="product_col_val" id="product_col_val">
      </div>
      <div class="form-group">
         <label for="imprint_col_val">What is the imprint color, note PMS if needed?</label>
         <input type="text" class="form-control" name="imprint_col_val" id="imprint_col_val">
      </div>
      <div class="form-group">
         <label for="pdt_img_link">Please include a link to the product image file, if not included in upload.</label>
         <input type="text" class="form-control" name="pdt_img_link" id="pdt_img_link">
      </div>
   </div> -->
   <div class="form-group" id="break_val"></div>
   <div class="form-group mt-3">
      <label class="tip" style="border-bottom: 1px dotted black;">
      Revision?
      </label>
      <div>
         <input type="radio" name="revise" value="New" checked>&nbsp;<label for="">New</label>&nbsp;
         <input type="radio" name="revise" value="Revision">&nbsp;<label for="">Revision</label>&nbsp;
         <input type="radio" name="revise" value="Quote First">&nbsp;<label for="">Quote First</label>&nbsp;
      </div>
   </div>
   <div class="form-group mt-3">
      <label class="tip" style="border-bottom: 1px dotted black;">Rush?</label>
      <div>
         <input type="radio" name="timeline" value="Standard" checked>&nbsp;<label for="">Standard</label>&nbsp;
         <input type="radio" name="timeline" value="Rush">&nbsp;<label for="">RUSH (doubles price)</label>&nbsp;
      </div>
   </div>
   <div class="form-group mt-3">
      <label class="tip" style="border-bottom: 1px dotted black;">Format needed</label>
      <div>
         <input id="pdf_check" type="checkbox" name="format[]" value="Vector PDF">&nbsp;<label for="">Vector PDF</label>&nbsp;
         <input type="checkbox" name="format[]" value="CS6 EPS">&nbsp;<label for="">CS6 EPS</label>&nbsp;
         <input type="checkbox" name="format[]" value="CS5 EPS">&nbsp;<label for="">CS5 EPS</label>&nbsp;
         <input type="checkbox" name="format[]" value="CS4 EPS">&nbsp;<label for="">CS4 EPS</label>&nbsp;
         <input type="checkbox" id="jpg_check" name="format[]" value="JPG">&nbsp;<label for="">JPG</label>&nbsp;
         <input type="checkbox" name="format[]" value="PNG">&nbsp;<label for="">PNG</label>&nbsp;
         <input type="checkbox" name="format[]" value="High Res 300 DPI">&nbsp;<label for="">High Res 300 DPI</label>&nbsp;
      </div>
   </div>
   <div class="form-group mt-3">
      <label for="job_description" class="tip" style="border-bottom: 1px dotted black;">Description</label>
      <textarea class="form-control" rows="3" name="job_description" id="job_description" placeholder="Enter Job Description"></textarea>
   </div>
   <div class="form-group mt-3">
      <label for="deadline" class="tip" style="border-bottom: 1px dotted black;">Deadline </label>
      <input type="date" class="form-control datepicker" name="deadline" id="deadline">
   </div>
   <div class="row mt-3">
      <div class="col-md-12">
         <label for="text-only" class="tip" style="border-bottom: 1px dotted black;">Text Only</label>&nbsp;<input type="checkbox" id="text-only" onclick="$('.file-section').slideToggle()">
      </div>
   </div>
   <div class="divide-20 mt-3">
   </div>
   <!-- <div class="dropzone-previews dz-message alert alert-success" style="border-width:7px; border-style:dashed;">
      <h3 class="text-center" id="msg" style="padding:5%;">Drop your files here Or Click!</h3>
   </div> -->
   <div class="file-section"><input type="file" name="files[]" multiple/></div>
   <button type="submit" id="aj_submit" class="btn btn-success" name="postdata">Post</button><span class="pull-right text-success font-14 font-400" id="message"></span>
</form>


