<div class="row">
    <div class="col-lg-10">

        <div class="form-group">
            <div class="col-lg-4">
                <label>School Name<span id="" style="font-size:11px;color:Red">*</span> </label>
            </div>

            <div class="col-lg-6">
                <select class="form-control" name="school-full" id="school_full"
                    required="required">
                    <option VALUE="">SELECT</option>
                    <?php while($shShc=$rs->fetch_object()){?>

                    <option VALUE="<?php echo htmlentities($shShc->school_id);?>">
                        <?php echo htmlentities($shShc->school_full)?></option>


                    <?php }?> </div>

            </select>
            <span id="school-availability-status" style="font-size:12px;"></span>
        </div>

        <br><br>
        
        <div class="form-group">
            <div class="col-lg-4">
                <label>Department Name<span id="" style="font-size:11px;color:Red">*</span> </label>
            </div>

            <div class="col-lg-6">
                <select class="form-control" name="school-dep" id="school_dep"
                    required="required">
                    <option VALUE="">SELECT</option>
                    <?php while($shDep=$rs1->fetch_object()){?>

                    <option VALUE="<?php echo htmlentities($shDep->school_short);?>">
                        <?php echo htmlentities($shDep->school_dep)?></option>


                    <?php }?> </div>

            </select>
            <span id="school-availability-status" style="font-size:12px;"></span>
        </div>

        <br><br>
        <div class="form-group">
            <div class="col-lg-4">
                <label>School Session<span id="" style="font-size:11px;color:Red">*</span> </label>
            </div>

            <div class="col-lg-6">
                <select class="form-control" name="session" id="session"
                    required="required">
                    <option VALUE="">SELECT</option>
                    <?php while($shSes=$rs2->fetch_object()){?>

                    <option VALUE="<?php echo htmlentities($shShc->id);?>">
                        <?php echo htmlentities($shSes->session)?></option>


                    <?php }?> </div>

            </select>
            <span id="school-availability-status" style="font-size:12px;"></span>
        </div>

        <br><br>

        <br><br>

        <div class="form-group">
            <div class="col-lg-4">
                <label>Creation Date</label>
            </div>
            <div class="col-lg-6">
                <input class="form-control" value="<?php echo date('d-m-Y');?>" readonly="readonly" name="cdate">

            </div>
        </div>
    </div>

    <br><br>

    <div class="form-group">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-6"><br><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Create School"></button>
        </div>

    </div>

</div>