function inWinkelwagen() {
                        $_SESSION['winkelwagen'] = '$row["Product_ID"]';
                        print_r($_SESSION);
                    }