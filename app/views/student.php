<div class="row">
  <div class="col-lg-3 col-md-4 pd-left-none no-pd">
    <div class="main-left-sidebar no-margin">
      <div class="user-data full-width">
        <div class="user-profile">
          <div class="username-dt">
            <div class="usr-pic">
              <img src="../images/users/<?=$_SESSION['user']['img']?>" alt="" style="height: 100% !important;">
            </div>
          </div>
          <div class="user-specs">
            <h3><?= $_SESSION['user']['fname'] . " " . $_SESSION['user']['lname'] ?></h3>
            <span><?= $_SESSION['user']['category'] == 1 ? "Teacher" : "Student"; ?></span>
          </div>
        </div>
        <ul class="user-fw-status">
          <!--              <li>
            <h4>Following</h4>
            <span>34</span>
          </li>
          <li>
            <h4>Followers</h4>
            <span>155</span>
          </li> -->
          <li>
            <a href="#" title="">View Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
    <div class="col-lg-6 col-md-8 no-pd">
        <div class="main-ws-sec">
            <div class="posts-section" id="tutor_filter"></div>
        </div>
    </div>
    <div class="col-lg-3 pd-right-none no-pd">
        <div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                  <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>Students</h3>
                <span>View Students List</span>
            </div>
            <?=Components::topTutors()?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        fetchStudents();
    });

    var spinner = '<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>';
    $(".select2").select2();

    function fetchStudents(){
        $("#tutor_filter").html(spinner);
        var results = '';
        $.post("controller/ajax.php?q=Users&m=students_lists",$("#frmSearchTutor").serialize(),function(data,status){
            var res = JSON.parse(data);
            if(res.students.length > 0){
                for (var i = 0; i < res.students.length; i++) {
                    results += skinTutor(res.students[i],res.header);
                }
            }else{
                results += '<div class="company_profile_info">'+
                    '<a href="#" title=""><span class="fa fa-exclamation"></span> No Tutor Found</a>'+
                '</div>';
            }
            $("#tutor_filter").html(results);
        });
    }

    function skinTutor(res,header)
    {
        return '<div class="company_profile_info">'+
        '<div class="company-up-info" style="padding: 30px 0 0px 0 !important;">'+
        '<img src="../images/users/'+res.user_img+'" alt="" style="width:150px !important;height: 150px !important;">'+
        '<h3>'+res.user_fname+'</h3>'+
        '<h4>'+res.user_mobile+'</h4>'+
        '<a class="btn btn-success" href="controller/ajax.php?q=Messages&m=init&receiver_id='+res.user_id+'" title=""><span class="fa fa-envelope"></span> Message</a> '+
        '<a class="btn btn-info" href="index.php?q=pds&id='+res.user_id+'" title=""><span class="fa fa-user"></span> View Profile</a> '+ 
        '<ul class="user-fw-status" style="margin-top: 5px;">'+
        // '<li>'+
        // '<h4>Course</h4>'+
        // '<span></span>'+
        // '</li>'+
        '</ul>'+
        '</div>'+
        '</div>';
    }
</script>