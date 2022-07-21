
@if($memberCategory)
   <form action="{{ route('addCategory') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
      @csrf
      <div class="form-group">
         <label for="name">Name*</label>
         <input type="text" name="name" class="form-control" id="name" value="{{$memberCategory->name}}" placeholder="Category name" required/>
      </div>
      <div class="form-group">
         <label for="paymentType">Payment Type*</label>
         <select id="paymentType" name="paymentType" class="form-control" required="required">
            <option value="Monthly" {{($memberCategory->paymentType=='Monthly') ? 'selected' : ''}}>Monthly</option>
            <option value="One Time" {{($memberCategory->paymentType=='One Time') ? 'selected' : ''}}>One Time</option>
         </select>
      </div>
      <div class="form-group">
         <label for="reg_fee">Registration Fee*</label>
         <input type="number" name="reg_fee" class="form-control" id="reg_fee" value="{{$memberCategory->reg_fee}}" placeholder="1000" required/>
      </div>
      <div class="form-group">
         <div class="form-check form-check-inline">
            <label>Admission fee to be paid in time of application:</label>
         </div>
         <br>
         <div class="radio-toolbar form-check form-check-inline">
            <div class="radio">
               <input type="radio" id="paidNo" name="paid" value="no" checked>
               <label for="paidNo">No</label>
            </div>
            <div class="radio ml-4">
               <input type="radio" id="paidYes" name="paid" value="yes">
               <label for="paidYes">Yes</label>
            </div>
         </div>
      </div>
      <div class="hide" id="paidStatus">
         <div class="" data_id="paidAction">
            <div class="form-group">
               <label for="fee">Percentage(%) of total admission fee*</label>
               <input type="number" name="percentage" class="form-control" id="fee" placeholder="10, 20, 30..."/>
            </div>
         </div>
      </div>
      <div id="monthly" class="hide">
         <div class="form-group" data_id="monthlyFee">
            <label for="monthly">Monthly Fee*</label>
            <input type="number" name="monthly" class="form-control" id="monthlyFee" placeholder="500"/>
         </div>
      </div>
      <div class="modal-footer">
         <div class="btn-group">
            <button class="btn btn-sm btn-primary">Save</button>
            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
         </div>
      </div>
   </form>
@endif
