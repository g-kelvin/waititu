<div class="cui-menu-left-scroll">
    <ul class="cui-menu-left-list cui-menu-left-list-root">

        <li class="cui-menu-left-item">
            <a href="/">
                <span class="cui-menu-left-icon icmn-home"></span>
                <span class="cui-menu-left-title">Home</span>
            </a>
        </li>

        <?php
        if ($_SESSION['user_type'] == 'admin') { ?>
        <li class="cui-menu-left-item cui-menu-left-submenu">
            <a href="javascript: void(0);">
                <span class="cui-menu-left-icon icmn-users"></span>
                <span class="cui-menu-left-title">Service Providers </span>
            </a>
            <ul class="cui-menu-left-list">
                <li class="cui-menu-left-item">
                    <a href="/admin">
                        <span class="cui-menu-left-icon icmn-users"></span>
                        <span class="cui-menu-left-title">List</span>
                    </a>
                    <a href="/admin/add-serviceprovider.php">
                        <span class="cui-menu-left-icon icmn-plus"></span>
                        <span class="cui-menu-left-title">Add</span>
                    </a>

                </li>
            </ul>

        </li>
        <?php } ?>

        <li class="cui-menu-left-item cui-menu-left-submenu">
            <a href="javascript: void(0);">
                <span class="cui-menu-left-icon icmn-wrench"></span>
                <span class="cui-menu-left-title">Requests </span>
            </a>
            <ul class="cui-menu-left-list">
                <li class="cui-menu-left-item">
                    <?php
                    if ($_SESSION['user_type'] == 'admin') { ?>
                    <a href="/admin/new_request.php">
                        <span class="cui-menu-left-icon icmn-plus"></span>
                        <span class="cui-menu-left-title">Add</span>
                    </a>
                    <?php } ?>
                    <a href="/admin/requests.php">
                        <span class="cui-menu-left-icon icmn-files-empty"></span>
                        <span class="cui-menu-left-title">Existing Requests</span>
                    </a>



                </li>
            </ul>

        </li>

        <li class="cui-menu-left-item ">
            <a href="/admin/logout.php">
                <span class="cui-menu-left-icon icmn-power"></span>
                <span class="cui-menu-left-title">Logout </span>
            </a>


        </li>





    </ul>
</div>