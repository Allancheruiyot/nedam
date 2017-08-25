@include('includes.head')
@include('includes.nav')

<style type="text/css">
	
	#page-dash {
    padding: 0 15px;
    padding-top: 20px !important;
    margin: 0 200px 0 200px;
    min-height: 100vh;
    background-color: #fff;
}

@media(min-width:768px) {
    #page-dash {
        position: inherit;
        padding: 0 30px;
        min-height: 100vh;
        border-left: 1px solid #e7e7e7;
    }
}
</style>

<div id="page-dash">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@include('includes.footer')