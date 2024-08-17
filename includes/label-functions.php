<?php
// Function to generate PDF content for shipping label
function generate_label_pdf($order) {
    // Include TCPDF library
    if (!class_exists('TCPDF')) {
        require_once plugin_dir_path(__FILE__) . '../tcpdf/tcpdf.php';
    }

    // Gather order details
    $order_id = $order->get_id();
    $billing_first_name = $order->get_billing_first_name();
    $billing_last_name = $order->get_billing_last_name();
    $billing_address_1 = $order->get_billing_address_1();
    $billing_city = $order->get_billing_city();
    $billing_state = $order->get_billing_state();
    $billing_phone = $order->get_billing_phone();
    $order_weight = $order->get_meta('order_weight', true);
    $cod_amount = $order->get_total();
    $billing_phone1 = $order->get_meta('billing_phone1', true);
    $billing_district = $order->get_meta('billing_district', true);

    // Read HTML template from file
    $template_file = plugin_dir_path(__FILE__) . '../templates/shipping-label-template.html';
    $html_template = file_get_contents($template_file);

    // Replace placeholders in HTML template with order details
    $html_template = str_replace('Sample_name', $billing_first_name . ' ' . $billing_last_name, $html_template);
    $html_template = str_replace('Sample_address', $billing_address_1, $html_template);
    $html_template = str_replace('Sample_city', $billing_city, $html_template);
    $html_template = str_replace('Sample_district', $billing_district, $html_template);
    $html_template = str_replace('Sample_phone', $billing_phone, $html_template);
    $html_template = str_replace('phone2', $billing_phone1, $html_template);
    $html_template = str_replace('Sample_orderweight', $order_weight, $html_template);
    $html_template = str_replace('Sample_ordernumber', $order_id, $html_template);
    $html_template = str_replace('Sample_price', number_format((float)$cod_amount, 2, '.', ''), $html_template);
    

      // Create PDF
    $pdf = new TCPDF('P', 'in', array(4, 6), true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Talkz.lk');
    $pdf->SetTitle('Shipping Label');
    $pdf->SetSubject('Shipping Label');

    // Set header and footer data
    $pdf->setHeaderData('', 0, '', '');

    // Set header and footer fonts
    $pdf->setHeaderFont(Array('helvetica', '', 5));
    $pdf->setFooterFont(Array('helvetica', '', 3));

    // Remove default header and footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Set margins (adjusted to fit the page size)
    $pdf->SetMargins(0.05, 0.05, 0.05, true); // Small margins to ensure content fits

    // Set auto page breaks
    $pdf->SetAutoPageBreak(FALSE, 0);

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 3);

    // Write HTML content to PDF
    $pdf->writeHTML($html_template, true, false, true, false, '');

    // Output PDF
    return $pdf->Output('', 'S');
}
