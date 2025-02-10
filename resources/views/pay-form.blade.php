<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyFatoorah Payment Form</title>
</head>
<body>

  <h2>MyFatoorah Payment Form</h2>

  <form id="paymentForm">
    <label for="customerName">Customer Name:</label>
    <input type="text" id="customerName" name="customerName" required><br><br>

    <label for="customerEmail">Customer Email:</label>
    <input type="email" id="customerEmail" name="customerEmail" required><br><br>

    <label for="customerMobile">Customer Mobile:</label>
    <input type="text" id="customerMobile" name="customerMobile" required><br><br>

    <label for="invoiceValue">Invoice Amount:</label>
    <input type="number" id="invoiceValue" name="invoiceValue" required><br><br>

    <label for="currencyIso">Currency (e.g., KWD):</label>
    <input type="text" id="currencyIso" name="currencyIso" value="KWD" required><br><br>

    <button type="button" onclick="submitPayment()">Pay Now</button>
  </form>

  <script>
    async function submitPayment() {
      const apiUrl = "https://myfatoorah.com/";
      const apiKey = "rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL";
      const formData = {
        PaymentMethodId: 2,
        CustomerName: document.getElementById("customerName").value,
        DisplayCurrencyIso: document.getElementById("currencyIso").value,
        CustomerMobile: document.getElementById("customerMobile").value,
        CustomerEmail: document.getElementById("customerEmail").value,
        InvoiceValue: parseFloat(document.getElementById("invoiceValue").value),
        CallBackUrl: "{{route('payment.success')}}",
        ErrorUrl:    "{{route('payment.failed')}}",
        Language:     "EN"
      };
      try {
        const response = await fetch(apiUrl, {
          method: "POST",
          headers: {
            "Authorization": `Bearer ${apiKey}`,
            "Content-Type": "application/json"
          },
          body: JSON.stringify(formData)
        });
        const result = await response.json();
        console.log("Payment Response:", result);

        if (result.IsSuccess) {
          window.location.href = result.Data.PaymentURL;
        } else {
          alert("Payment Failed: " + result.Message);
        }
      } catch (error) {
        console.error("Error submitting payment:", error);
      }
    }
  </script>

</body>
</html>
