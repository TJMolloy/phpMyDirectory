<?php
include('../../../defaults.php');

$PMDR->loadLanguage(array('user_invoices'));

if(isset($_POST['MerchantReference'])) {
    include(PMDROOT.'/includes/class_payment_api.php');
    include(PMDROOT.'/modules/processors/GTBillQuickPay/GTBillQuickPay_class.php');
    $processor = new GTBillQuickPay_Notification($PMDR);
    $processor->process();

    if($processor->settings['testmode']) {
        $processor->sendDebugEmail($PMDR->getConfig('admin_email'));
    }
}
?>