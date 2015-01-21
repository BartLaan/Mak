function inWinkelwagen() {
                        $_SESSION['winkelwagen'] = "$row["Product_ID"]";
                        document.getElementByID("test").innerHTML = "test";
                    }