<!-- modal nav -->
<div id="u-modalNav" style="display:none" class="c-flex">
    <!-- <div class="c-flex-basis_80">
        <p><img src="view/img/modal.jpg" alt="マイページ" height="900px" width="1000">1</p>
    </div> -->
    <div class="u-padding-inner c-flex-basis_20">
        <ul>
            <li class="c-transform-bottom">
                <div class="u-closeModal"><svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="opacity: 0.7;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: #4B4B4B;
                            }
                        </style>
                        <g>
                            <polygon class="st0" points="512,52.535 459.467,0.002 256.002,203.462 52.538,0.002 0,52.535 203.47,256.005 0,459.465
		52.533,511.998 256.002,308.527 459.467,511.998 512,459.475 308.536,256.005 	" style="fill: rgb(255, 255, 255);"></polygon>
                        </g>
                    </svg>
                </div>
            </li>
        </ul>
        <div class="c-padding-bottom_75 c-padding-top_100">
            <div class="c-flex c-flex-gap_10 c-padding-bottom_30">
                <div>
                    <p>こんにちは</p>
                    <p><?php echo $_SESSION['name'] ?>さん</p>
                </div>
                <p><img src="<?php echo DIR_IMG . $_SESSION['id'] . '/' . 'thumb_' . $_SESSION['file_name'] ?>" alt="サムネイル画像" width="" height=""></p>
            </div>

            <form method="post">
                <button type="submit" name="logout" class="c-entry-button">logout
                </button>
            </form>
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10 3H6a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h4M16 17l5-5-5-5M19.8 12H9" />
            </svg> -->
        </div>
        <nav class="c-padding-bottom_75">
            <ul class="c-flex c-flex-direction-column c-flex-gap_10_0 p-list-nav-bottom-hover">
                <li><a href="entry.php">ENTRY.PHP</a></li>
                <li><a href="confirm.php">CONFIRM.PHP</a></li>
                <li><a href="complete.php">COMPLETE</a></li>
                <li><a href="main_entry.php">MAIN_ENTRY.PHP</a></li>
                <li><a href="main_complete.php">MAIN_COMPLETE</a></li>
                <li><a href="login.php">LOGIN.PHP</a></li>
                <li><a href="index.php?page=0">INDEX.PHP</a></li>
            </ul>
        </nav>
        <address class="c-text-center">ph24</address>
    </div>
</div>