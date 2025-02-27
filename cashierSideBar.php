<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          
             <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Sells
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashierPOS.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-cart-plus"></i>
                  &nbsp;&nbsp;<p>Sell medicine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cashier_uza_kwa_mkopo.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-cart-plus"></i>
                  &nbsp;&nbsp;<p>Sell by credit</p>
                </a>
              </li>
            </ul>
            
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-wallet"></i>
                <p>Credits<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="tunaowadai.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Unpaid credits</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="expenditure.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Wanaotudai</p>
                </a>
              </li> -->
            </ul>
          </li>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashierViewProducts.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-eye"></i>
                  &nbsp;&nbsp;<p>View medicine</p>  
                </a>  
              </li>
            </ul>  
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashierViewProducts.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-receipt"></i>
                  &nbsp;&nbsp;<p>View sales</p>
                </a>  
              </li>
            </ul>  
            <ul class="nav nav-treeview">
            <li class="nav-item">
                  <a href="cashier_bidhaa_zilizoharibika.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt"></i>
                      &nbsp;&nbsp;<p>Damage medicines</p>
                  </a>
              </li> 
            </ul> 
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashier_qty_alert.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation-triangle"></i>
                  &nbsp;&nbsp;<p>Medicine alert</p> 
                </a>
              </li>
            </ul> 
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashier_out_of_stock.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-box-open"></i>
                  &nbsp;&nbsp;<p>Zero stock</p>
                </a>
              </li>
            </ul> 
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashier_ex_alert.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation"></i>
                  &nbsp;&nbsp;<p>Expire alert</p>
                </a>
              </li>
            </ul> 
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashier_expired_products.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-times"></i>
                  &nbsp;&nbsp;<p>Expired medicines</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="cashier_sales_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-file-alt"></i>
                  &nbsp;&nbsp;<p>Sales reports</p>
                </a>
              </li>
            </ul> 
          </li>
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-wallet"></i>
              <p>
                Expenditure
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashier_expenditure.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Record expenditure</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="cashier_expenditure_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-file-invoice-dollar"></i>
                  &nbsp;&nbsp;<p>Expenditure report</p>
                </a>
              </li>
            </ul>  
          </li>
          <li class="nav-item has-treeview">
          <a href="logout.php" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-power-off"></i>
                  &nbsp;&nbsp;&nbsp;<p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>