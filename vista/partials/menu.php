
<ul class="list-unstyled full-box dashboard-sideBar-Menu">
    <li>
        <a href="#">
            <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
        </a>
    </li>
    <?php if ($_SESSION["usuario"]["privilegio"] == "Administrador") { ?>


        <li>
            <a href="#!" class="btn-sideBar-SubMenu">
                <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administration <i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <ul class="list-unstyled full-box">
              <!--  <li>
                   <a href="Periodos.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Periodos</a>
                </li> -->
                <li>
                    <a href="Docentes.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Docentes</a>
                </li>
                <li>
                    <a href="Tutores.php"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Tutores</a>
                </li>
                <li>
                    <a href="Materias.php"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Materias</a>
                </li>
                 <li>
                    <a href="Carreras.php"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Carreras</a>
                </li>
                <li>
                    <a href=Grupos.php><i class="zmdi zmdi-book zmdi-hc-fw"></i> Grupos</a>
                </li>
            </ul>
        </li>
        <?php } elseif ($_SESSION["usuario"]["privilegio"] == "Alumno") { ?>
        <li>
            <a href="#!" class="btn-sideBar-SubMenu">
                <i class=""></i><span class="glyphicon glyphicon-book"></span> Solicitados<i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <a href="#!" class="btn-sideBar-SubMenu">
                <i class=""></i><span class="glyphicon glyphicon-hourglass"></span> Firmados <i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <a href="#!" class="btn-sideBar-SubMenu">
                <i class=""></i><span class="glyphicon glyphicon-duplicate"></span> Solicitud <i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <ul class="list-unstyled full-box">
                <li>
                    <a href="newjusticante.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Solicitar justificante</a>
                </li>
                <li>
                    <a href="teacher.html"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>Solicitados</a>
                </li>
                <li>
                    <a href="student.html"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Student</a>
                </li>
                <li>
                    <a href="representative.html"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Representative</a>
                </li>
            </ul>
        </li>

        <?php } elseif ($_SESSION["usuario"]["privilegio"] == "Tutor") { ?>
        <li>
            <a href="#!" class="btn-sideBar-SubMenu">
                <i class="zmdi zmdi-card zmdi-hc-fw"></i> Solicitados<i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <ul class="list-unstyled full-box">
                <li>
                    <a href="registration.html"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Aprobados</a>
                </li>
                <li>
                    <a href="payments.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Payments</a>
                </li>
            </ul>
        </li>
        <?php } elseif ($_SESSION["usuario"]["privilegio"] == "Director") { ?>

        <li>
            <a href="#!" class="btn-sideBar-SubMenu">
                <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Solicitados <i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <ul class="list-unstyled full-box">
                <li>
                    <a href="school.html"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Aprobados</a>
                </li>
            </ul>
        </li>
        <?php } elseif ($_SESSION["usuario"]["privilegio"] == "Docente") { ?>

        <li>
            <a href="#!" class="btn-sideBar-SubMenu">
                <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i>Justificantes Solicitados <i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <ul class="list-unstyled full-box">
                <li>
                   <!--<a href="school.html"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Justificante Aprobados</a>-->
                </li>
            </ul>
        </li>

        <?php } ?>
</ul>