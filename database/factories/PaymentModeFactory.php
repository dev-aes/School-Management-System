<?php

namespace Database\Factories;

use App\Models\PaymentMode;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentModeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentMode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return $this->random();
    }

    public function random()
    {
        $titles = Arr::random(['Gcash', 'Cebuana Lhuillier', 'School', 'Palawan Pawnshop']);
        $account_no = Arr::random(['0988382832', '0988382832', '097732636261', '']);

        return array('title' => $titles , 'account_number' => $account_no);
    }
}
