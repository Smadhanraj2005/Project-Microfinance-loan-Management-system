<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMessage = strtolower(trim($_POST["message"]));
    $botResponse = "";

    if (preg_match('/\b(apply|get|need)\b.*\b(loan)\b/', $userMessage)) {
        $botResponse = "To apply for a loan, go to 'Apply for Loan' in the menu and fill out the form.";
    } elseif (preg_match('/\b(status|track|check)\b.*\b(loan)\b/', $userMessage)) {
        $botResponse = "Check your loan application status under 'View Loan Status'.";
    } elseif (preg_match('/\b(repay|installment|due|payment)\b/', $userMessage)) {
        $botResponse = "Your repayment schedule is available under 'Repayment Schedule'.";
    } elseif (preg_match('/\b(emi|calculate|monthly)\b.*\b(payment|loan)?\b/', $userMessage)) {
        $botResponse = "Use the 'Loan EMI Calculator' in the menu to estimate your monthly payments.";
    } elseif (preg_match('/\b(offer|received|eligible)\b/', $userMessage)) {
        $botResponse = "Go to 'Loan Offers Received' to check available offers.";
    } elseif (preg_match('/\b(update|edit|change)\b.*\b(profile|details|kyc)\b/', $userMessage)) {
        $botResponse = "Go to 'My Profile' to view or update your details.";
    } elseif (preg_match('/\b(transaction|history|past)\b/', $userMessage)) {
        $botResponse = "You can view your full transaction history under 'Transaction History'.";
    } elseif (preg_match('/\b(contact|admin|help|support)\b/', $userMessage)) {
        $botResponse = "Please contact the admin via the contact option on the dashboard.";
    } elseif (preg_match('/\b(literacy|education|learn|info|information)\b.*\b(loan|finance)?\b/', $userMessage)) {
        $botResponse = "Check out the 'Financial Literacy' section for resources and learning material.";
    } else {
        $botResponse = "Sorry, I didn't understand. Try asking about loans, EMI, repayment, or profile.";
    }

    echo $botResponse;
}
?>
