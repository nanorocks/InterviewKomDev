<?php

$users = [
	["id" => 1, "username" => "user1"],
    ["id" => 2, "username" => "user2"],
    ["id" => 3, "username" => "user3"]
];

$transactions = [
    ["id" => 1, "user_id" => 1, "amount" => 1000],
	["id" => 2, "user_id" => 2, "amount" => 5000],
    ["id" => 3, "user_id" => 1, "amount" => -200],
    ["id" => 4, "user_id" => 2, "amount" => -4000],
    ["id" => 5, "user_id" => 2, "amount" => -500],
    ["id" => 6, "user_id" => 2, "amount" => 3000],
    ["id" => 7, "user_id" => 3, "amount" => 2000],
    ["id" => 8, "user_id" => 3, "amount" => 200],
];

$combined = array();
foreach ($users as $user) {
    $comb = array('user_id' => $user['id'], 'username' => $user['username'], 'balance' => 0, 'transactions' => []);
    foreach ($transactions as $transaction) {

        if ($transaction['user_id'] !== $user['id']) {
            continue;
        }

        $comb['balance'] += $transaction['amount'];
        $comb['transactions'][] = [
            "transaction_id" => $transaction['id'],
            "amount" => $transaction['amount']
        ];
    }
    $combined[] = $comb;
}
echo "<pre>";
echo json_encode($combined);
echo "</pre>";