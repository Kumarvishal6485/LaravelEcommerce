<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XmlStatusParser extends Controller
{
    public static function Parser($xml) {
        $xml = html_entity_decode($xml);
        $data = [];
        if (preg_match_all("/<orderStatus(.*?)\/>/is", $xml ,$match)) {
            foreach ($match[0] as $order) {
                if (preg_match("/status=\"(.*?)\"/is", $order, $status)) {
                    if (preg_match("/create_at=\"(.*?)\"/is", $order, $date_time)) {
                        if (preg_match("/step=\"(.*?)\"/is", $order, $step)) {
                            $data[$step[1]]['status'] = $status[1];
                            $data[$step[1]]['create_at'] = $date_time[1];
                        }
                    }
                }
            }    
        }
        return $data;
    }

    /**
     * note: 
     * step = 1 => Order Placed
     * step = 2 => Shipped
     * step = 3 => Out For Delivery
     * step = 4 => Delivered
     * step = 5 => Cancelled
     * $orderStatuses in Orderstatus = ["Order Placed","Cancelled","Shipped","Out For Delivery","Delivered"]
     */
    public static function updateXml($xml, $status) {
        $xml = simplexml_load_string(html_entity_decode($xml));
        if ($xml) {
            $statusChild = $xml->addChild("orderStatus");
            $statusChild->addAttribute("create_at", Date(DATE_ATOM));
            $statusChild->addAttribute("status", $status);
            if ($status == "Shipped") {
                $statusChild->addAttribute("step", 2);
            } elseif ($status == "Out For Delivery") {
                $statusChild->addAttribute("step", 3);
            } elseif ($status == "Delivered") {
                $statusChild->addAttribute("step", 4);
            } elseif ($status == "Cancelled") {
                $statusChild->addAttribute("step", 5);
            }
        }
        return $xml->asXML();
    }
}
