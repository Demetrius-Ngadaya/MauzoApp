  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home             
              </p>
            </a>
          </li>          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="home.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-cart-plus"></i>

                  &nbsp;&nbsp;<p>Sell medicine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="uza_kwa_mkopo.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-cart-plus"></i>

                  &nbsp;&nbsp;<p>Sell by credit</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="return_product.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="fas fa-undo-alt"></i>
                      &nbsp;&nbsp;<p>Return medicine</p>
                  </a>
              </li> 
              <li class="nav-item">
                   <a href="all_sales.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                       &nbsp;&nbsp;&nbsp;<i class="fas fa-receipt"></i>
                       &nbsp;&nbsp;<p>All sales</p>
                   </a>
              </li> 
              <li class="nav-item">
                   <a href="bidhaa_20_zilizoingiza_pesa_nyingi.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                       &nbsp;&nbsp;&nbsp;<i class="fas fa-trophy"></i>
                       &nbsp;&nbsp;<p>Best medicine</p>
                   </a>
              </li> 
              <li class="nav-item">
                   <a href="bidhaa_20_zisizoingiza_pesa_nyingi.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                       &nbsp;&nbsp;&nbsp;<i class="fas fa-times-circle"></i>
                       &nbsp;&nbsp;<p>Weak medicine</p>
                   </a>
              </li> 
              </li> 
              <li class="nav-item">
                <a href="Zilizouzika_kidogo.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation-circle"></i>
                  &nbsp;&nbsp;<p>Less sold medicine</p>
                </a>
              </li> 
              </li>  
              <li class="nav-item">
                <a href="zilizouzika_sana.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-check-circle"></i>
                  &nbsp;&nbsp;<p>Most sold medicine</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="never_sold_products.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-ban"></i>
                  &nbsp;&nbsp;<p>Never sold medicine</p>
                </a>
              </li>            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-wallet"></i>
                <p>Credits<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="tunaowadai.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Credits</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="madeni_yaliyolipwa.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Paid credits</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-wallet"></i>
                <p>kubandika<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="home_kubandika.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Bandika</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="madeni_yaliyolipwa.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Bandua</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
              Medicine
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="view.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-eye"></i>
                  &nbsp;&nbsp;<p>List of medicine</p>
                </a>
             </li>
             <li class="nav-item">
                  <a href="bidhaa_zilizoharibika.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                      &nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt"></i>
                      &nbsp;&nbsp;<p>Damage medicine</p>
                  </a>
              </li> 
             <li class="nav-item">
                <a href="qty_alert.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation-triangle"></i>
                  &nbsp;&nbsp;<p>Stock alert</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="out_of_stock.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-box-open"></i>
                  &nbsp;&nbsp;<p>Zero stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ex_alert.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation"></i>
                  &nbsp;&nbsp;<p>Expire alert</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="expired_products.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-times"></i>
                  &nbsp;&nbsp;<p>Expired medicine</p>
                </a>
               </li>
            </ul>
          </li>          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-wallet"></i>
                <p>Expenditures<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="expenditure.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Record expenditure</p>
                </a>
              </li>
             </ul>
            </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-wallet"></i>
                <p>Purchases<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="record_purchases.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Record purchases</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="record_credit_purchases.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Record Credit purchases </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="credit_purchases_products.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-money-bill"></i>
                  &nbsp;&nbsp;<p>Credit purchases </p>
                </a>
              </li>
            </ul>
            </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="stock_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-list"></i>
                  &nbsp;&nbsp;<p>Medicine report</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="expenditure_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-file-invoice-dollar"></i>
                  &nbsp;&nbsp;<p>Expenditure report</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="sales_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-file-alt"></i>
                  &nbsp;&nbsp;<p>Sales report</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="ripoti _mauzo_ya_mkopo.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-file-alt"></i>
                  &nbsp;&nbsp;<p>Credit sales report</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="purchases_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-file-alt"></i>
                  &nbsp;&nbsp;<p>Purchases report</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="credit_purchases_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-file-alt"></i>
                  &nbsp;&nbsp;<p>Credit purchases report</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="total_sales_graph.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-chart-line"></i>
                  &nbsp;&nbsp;<p>Sold quntity graph</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sales_graph.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-chart-area"></i>
                  &nbsp;&nbsp;<p>Sold amount graph</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="profit_graph.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-chart-pie"></i>
                  &nbsp;&nbsp;<p>Profit graph</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="expenditure_graph.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-chart-bar"></i>
                  &nbsp;&nbsp;<p>Expenditure graph</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="business_analysis.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-chart-bar"></i>
                  &nbsp;&nbsp;<p>Business analysis</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="new_product.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-plus-circle"></i>
                  &nbsp;&nbsp;<p>Add medicine</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="user_management.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-users"></i>
                  &nbsp;&nbsp;<p>Users</p>
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
