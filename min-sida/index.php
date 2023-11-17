<?php

$host = "localhost";
$port = 3306;
$database = "test";
$username = "root";
$password = "";

$connection = new mysqli($host, $username, $password, $database, $port);

if ($connection->connect_error) {
   die("Anslutningen misslyckades:" . $connection->connect_error);
}

echo "<h1>Min E-Handel</h1>";


class Kund
{
   public $kundId;
   public $namn;
   public $adress;
   public $number;

   public function __construct($kundId, $namn, $adress, $number)
   {
      $this->kundId = $kundId;
      $this->namn = $namn;
      $this->adress = $adress;
      $this->number = $number;
   }
}

class Order
{
   public $orderId;
   public $beställningsDatum;
   public $kund;

   public function __construct($orderId, $beställningsDatum, Kund $kund)
   {
      $this->orderId = $orderId;
      $this->beställningsDatum = $beställningsDatum;
      $this->kund = $kund;
   }
}

class Ordervara
{
   public $varaId;
   public $produktNamn;
   public $pris;
   public $antal;
   public $order;

   public function __construct($varaId, $produktNamn, $pris, $antal, Order $order)
   {
      $this->varaId = $varaId;
      $this->produktNamn = $produktNamn;
      $this->pris = $pris;
      $this->antal = $antal;
      $this->order = $order;
   }
}

$kund = new Kund(1, "John Doe", "123 Main Street", "555-1234");

$order = new Order(101, date('Y-m-d H:i:s'), $kund);

$ordervara = new Ordervara(1001, "Boll", 49.99, 2, $order);

echo "Kund: {$kund->namn}, Order: {$order->orderId}, Ordervara: {$ordervara->produktNamn}";


$connection->close();
?>