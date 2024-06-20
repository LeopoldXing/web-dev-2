<?php

/*******w********
 *
 * Name: Luping Xing
 * Date: 27 May, 2024
 * Description: php file of assignment 2
 ****************/

$items = [
    ['index' => 1, 'name' => 'MacBook', 'price' => 1899.99, 'quantity' => 0],
    ['index' => 2, 'name' => 'Razer Gaming Mouse', 'price' => 79.99, 'quantity' => 0],
    ['index' => 3, 'name' => 'Portable Hard Drive', 'price' => 179.99, 'quantity' => 0],
    ['index' => 4, 'name' => 'Google Nexus 7', 'price' => 249.99, 'quantity' => 0],
    ['index' => 5, 'name' => 'Footpedal', 'price' => 119.99, 'quantity' => 0]
];

function validate_input()
{
    $errors = [];

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $errors[] = "Invalid email address.";
    }
    $postalCode = filter_input(INPUT_POST, 'postal', FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/^[ABCEGHJ-NPRSTVXY][0-9][ABCEGHJ-NPRSTV-Z][ ]?[0-9][ABCEGHJ-NPRSTV-Z][0-9]$/')));
    if (!$postalCode) {
        $errors[] = "Invalid postal code.";
    }

    $cardNumber = filter_input(INPUT_POST, 'cardnumber', FILTER_SANITIZE_NUMBER_INT);
    $creditCardLength = strlen($cardNumber);
    if ($creditCardLength != 10) {
        $errors[] = "Credit card number must be 10 digits.";
    }

    $month = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_NUMBER_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
    if ($month < 1 || $month > 12) {
        $errors[] = "Credit card month must be between 1 and 12.";
    }
    $currentYear = date('Y');
    $currentMonth = date('m');
    if ($year < $currentYear || $year > (int)$currentYear + 5) {
        $errors[] = "Credit card year must be between $currentYear and " . ((int)$currentYear + 5) . ".";
    }
    if($year == $currentYear && $month <= $currentMonth) {
      $errors[] = "Credit card month must be in future date";
    }

    $creditCardType = isset($_POST['cardtype']) ? $_POST['cardtype'] : null;
    if (!$creditCardType) {
        $errors[] = "Credit card type must be selected.";
    }

    $cardName = isset($_POST['cardname']) ? $_POST['cardname'] : '';
    $fullName = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    if (!$cardName) {
        $errors[] = "Credit card name is required.";
    }
    if (!$fullName) {
        $errors[] = "Name is required.";
    }
    if (!$address) {
        $errors[] = "Address is required.";
    }
    if (!$city) {
        $errors[] = "City is required.";
    }

    $provinces = ["AB", "BC", "MB", "NB", "NL", "NS", "NT", "NU", "ON", "PE", "QC", "SK", "YT"];
    $province = $_POST['province'];
    if (!in_array($province, $provinces)) {
        $errors[] = "Invalid province code: " . $province;
    }

    $hasItem = false;
    for ($i = 1; $i < 6; $i++) {
        $quantity = filter_input(INPUT_POST, "qty" . $i, FILTER_VALIDATE_INT);
        if (!$quantity && $_POST["qty" . $i] !== "") {
            $errors[] = "Quantity must be numeric";
            break;
        } else {
            if($quantity != 0) $hasItem = true;
        }
    }

    if(!$hasItem) {
        $errors[] = "There is no item selected";
    }

    return $errors;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="response.css">
  <title>Thanks for your order!</title>
</head>
<body>
<!-- Remember that alternative syntax is good and html inside php is bad -->
<?php
$errorList = validate_input();

?>

<?php if (count($errorList) > 0): ?>
  <p>The form has following errors:</p>
  <ul>
      <?php foreach ($errorList as $errorMessage): ?>
        <li><?php echo $errorMessage; ?></li>
      <?php endforeach; ?>
  </ul>
<?php elseif (count($errorList) == 0): ?>
  <div class="invoice">
    <h2>Thanks for your order</h2>
    <h3>Here's a summary of your order:</h3>
    <table>
      <tbody>
      <tr>
        <td colspan="4">
          <h3>Address Information</h3>
        </td>
      </tr>
      <tr>
        <td class="alignright"><span class="bold">Address:</span>
        </td>
        <td><?php echo $_POST["address"] ?></td>
        <td class="alignright"><span class="bold">City:</span>
        </td>
        <td><?php echo $_POST["city"]; ?></td>
      </tr>
      <tr>
        <td class="alignright"><span class="bold">Province:</span>
        </td>
        <td><?php echo $_POST["province"]; ?></td>
        <td class="alignright"><span class="bold">Postal Code:</span>
        </td>
        <td><?php echo $_POST["postal"]; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="alignright"><span class="bold">Email:</span>
        </td>
        <td colspan="2"><?php echo $_POST["email"]; ?></td>
      </tr>
      </tbody>
    </table>
    <h3>Order Information</h3>
    <table>
      <thead>
      <tr>
        <th>Quantity</th>
        <th>Description</th>
        <th>Cost</th>
      </tr>
      </thead>
      <tbody>
      <?php
      for ($i = 1; $i <= 5; $i++) {
          $quantity = $_POST["qty$i"];
          if ($quantity > 0) {
              $description = $items[$i - 1]["name"];
              $cost = $items[$i - 1]["price"] * $quantity;

              $output = "<tr>
                      <td>$quantity</td>
                      <td>$description</td>
                      <td>$cost</td>
                     </tr>";
              echo $output;
          }
      }
      ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>

</body>
</html>
