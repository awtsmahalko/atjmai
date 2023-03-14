<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="search-box" style="margin-bottom: 30px;float: none;width: 100%;padding: 0;padding-bottom: 20px;">
            <form id="frmSearchTutor">
                <input type="text" name="subject" placeholder="Search subjects" required>
                <button type="submit" id="btn-search">Search</button>
            </form>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-5">
        <div class="main-ws-sec">
            <div class="posts-section" id="tutor_filter"></div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="right-sidebar">
            <div class="widget widget-about">
                <div class="sign_link">
                  <img src="../images/cpsu-tutor-logo.png" alt="">
                </div>
                <h3>Tutors</h3>
                <span>View Tutors List</span>
            </div>
            <?=Components::topTutors()?>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>

<script type="text/javascript">

    var spinner = '<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>';

    getTutors();
    $(".select2").select2();
    $("#frmSearchTutor").submit(function(e){
        e.preventDefault();
        $("#tutor_filter").html(spinner);
        var results = '';
        $.post("controller/ajax.php?q=Tutor&m=search",$("#frmSearchTutor").serialize(),function(data,status){
            var res = JSON.parse(data);
            if(res.tutors.length > 0){
                for (var i = 0; i < res.tutors.length; i++) {
                    results += skinTutor(res.tutors[i],res.header);
                }
            }else{
                results += '<div class="company_profile_info">'+
                    '<a href="#" title=""><span class="fa fa-exclamation"></span> No Tutor Found</a>'+
                '</div>';
            }
            $("#tutor_filter").html(results);
        });
    });

    function skinTutor(res,header)
    {
        var add_skin = '',add_skin_ = '',availability_status = '', apply = '';
        if(res.tutorials.tutorial_id > 0){
            add_skin += '<ul class="user-fw-status" style="margin-top: 5px;">'+
                '<li>'+
                '<h4>Subject Offered</h4>'+
                '<span>'+res.tutorials.subject_name+'</span>'+
                '</li>'+
                '<li>'+
                '<h4>Date Inclusion</h4>'+
                '<span>'+res.tutorials.date_start+"&mdash;"+res.tutorials.date_end+'</span>'+
                '</li>'+
                '<li>'+
                '<h4>Schedule</h4>'+
                '<span>'+res.tutorials.schedule+'</span>'+
                '</li>'+
                '<li>'+
                '<h4>Payment</h4>'+
                '<span>Negotiable</span>'+
                '</li>'+
                '<li>'+
                '<h4>Tutorial Status</h4>'+
                '<span>'+res.tutorials.tutorial_status+'</span>'+
                '</li>'+
                '</ul>';
            var label_stat = res.tutorials.tutorial_status == 'PENDING' ? "Available" : "Ongoing Tutorial";
            apply = res.tutorials.tutorial_status == 'PENDING' ? '<button class="btn btn-warning" onclick=\'apply("'+res.tutorials.tutorial_id+'","'+res.user_id+'")\' title=""><span class="fa fa-external-link"></span> Apply</button> ' : "";
            availability_status = '<label class="badge badge-success" style="font-size: 18px;">'+label_stat+'</label>';
        }else{
            availability_status = '<label class="badge badge-danger" style="font-size: 18px;">Unavailable</label>';
            add_skin_ += "<br>";
        }
        return '<div class="company_profile_info">'+
        '<div style="float: right;margin: 10px;">'+availability_status+'</div>'+
        '<div class="company-up-info" style="padding: 30px 0 0px 0 !important;">'+
        '<img src="../images/users/'+res.user_img+'" alt="" style="width:150px !important;height: 150px !important;">'+
        '<h3>'+res.user_fullname+'</h3>'+
        '<h4>'+res.user_mobile+'</h4>'+
        '<a class="btn btn-success" href="controller/ajax.php?q=Messages&m=init&receiver_id='+res.user_id+'" title=""><span class="fa fa-envelope"></span> Message</a> '+
        '<a class="btn btn-info" href="index.php?q=pds&id='+res.user_id+'" title=""><span class="fa fa-user"></span> View Profile</a> '+ 
        apply + 
        '<div style="padding:5px;" id="tutor-response-'+res.user_id+'"></div>'+
        add_skin +
        '</div><span><br></span>'+add_skin_ +
        '</div>';
    }

    function getTutors(){
        $("#tutor_filter").html(spinner);
        var results = '';
        $.post("controller/ajax.php?q=Tutor&m=search_all",{
            subject:''
        },function(data,status){
            var res = JSON.parse(data);
            if(res.tutors.length > 0){
                for (var i = 0; i < res.tutors.length; i++) {
                    results += skinTutor(res.tutors[i],res.header);
                }
            }else{
                results += '<div class="company_profile_info">'+
                    '<a href="#" title=""><span class="fa fa-exclamation"></span> No Tutor Found</a>'+
                '</div>';
            }
            $("#tutor_filter").html(results);
        });
    }

    function apply(tutorial_id,user_id){
        var conf = confirm("Are you sure to apply?");
        if(conf){
          $.post("controller/ajax.php?q=Posts&m=apply_in_tutor",{
            tutorial_id:tutorial_id,
            post_id:0,
            post_by:user_id
          },function(data,status){
            if(data == 1){
                $("#tutor-response-"+user_id).html('<div class="alert alert-success">Successfully applied to tutor.</div>');
            }else if(data == 2){
                $("#tutor-response-"+user_id).html('<div class="alert alert-danger">You already applied to tutor.</div>');
            }else{
                location.reload();
            }
          });
        }
    }
</script>