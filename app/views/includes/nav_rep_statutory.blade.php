 <nav class="navbar-default navbar-static-side" role="navigation" id="wrap">
    
           


            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu">

                    <li>
                        <a href="{{ URL::to('payrollReports/selectNssfPeriod') }}" _blank"><i class="glyphicon glyphicon-file fa-fw"></i> NSSF Returns</a>
                    </li>

                    <li>
                        <a href="{{ URL::to('payrollReports/selectNhifPeriod') }}" _blank"><i class="glyphicon glyphicon-file fa-fw"></i> NHIF Returns</a>
                    </li>

                    <li>
                        <a href="{{ URL::to('payrollReports/selectPayePeriod') }}" _blank"><i class="glyphicon glyphicon-file fa-fw"></i> Paye Returns</a>
                    </li>

                    <li>
                        <a href="{{ URL::to('payrollReports/selectYear') }}"><i class="glyphicon glyphicon-file fa-fw"></i> P9 Form</a>
                    </li>

                    <li>
                        <a href="{{ URL::to('mergeStatutory/selectPeriod') }}"><i class="glyphicon glyphicon-file fa-fw"></i> Merge Statutory Report</a>
                    </li>

                    <li>
                       <a href="{{ URL::to('itax/download') }}"><i class="glyphicon glyphicon-file fa-fw"></i>Download Itax Template</a>
                    </li>
                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->