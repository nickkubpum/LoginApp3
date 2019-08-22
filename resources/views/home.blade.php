@extends('layouts.app')

@section('content')

<script language="JavaScript">

function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
        newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
    }

    document.getElementById(id).height= (newheight) + "px";
    document.getElementById(id).width= (newwidth) + "px";
}

</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>แบบสำรวจความพึงพอใจและความคิดเห็นของหน่วยรับตรวจที่มีต่อการให้บริการของสำนักงานการตรวจเงินแผ่นดิน</h4></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <IFRAME SRC="http://epayroll.cgd.go.th/CGDQTN/Ent/AssessmentFillServlet?frmCde=20160001&act=UPDMEM" width="100%" height="930" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');"></iframe>	
                    <!-- <iframe width="1068" scrolling="" height="930" src="http://epayroll.cgd.go.th/CGDQTN/Ent/AssessmentFillServlet?frmCde=20160001&act=UPDMEM"></iframe> -->
                    <!-- You are logged in! -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
