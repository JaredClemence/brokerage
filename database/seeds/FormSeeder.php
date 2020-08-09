<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\DataModel\TransactionForm;
use App\DataModel\FileContent;
use App\DataModel\ByteCode;
use App\DataModel\StandardFormQuestion;
use Carbon\Carbon;

class FormSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->installPurchaseAgreements();
    }

    private function installFile($fileName, $formName, $formCode, $revisionDateString) {
        $fileContent = $this->getRPAForm($fileName);

        $file = FileContent::create([
                    'content' => $fileContent
        ]);
        $form = TransactionForm::create([
                    'name' => $formName,
                    'short' => $formCode,
                    'revised_on' => new Carbon($revisionDateString, new \DateTimeZone("America/Los_Angeles")),
                    'file_content_id' => $file->id,
        ]);
        return $form;
    }

    private function getRPAForm($fileName) {
        $filePath = "DRE/$fileName";
        return Storage::disk('local')->get($filePath);
    }

    private function addByteCode($form, $plaintext) {
        $byteCode = ByteCode::create([
                        'plaintext' => $plaintext,
                        'bytecode' => ''
        ]);
        $form->bytecode()->save($byteCode);
    }

    private function addQuestion($form, $sort, $question, $type, $name, $options='') {
        StandardFormQuestion::create(
                [
                    'sort_order'=>$sort,
                    'short'=>$form->short,
                    'question'=>$question,
                    'data_type'=>$type,
                    'answer_name'=>$name,
                    'options'=>$options
                ]
                );
    }

    public function installPurchaseAgreements() {
        $this->installRPACA();
    }
    public function installRPACA(){
        $rpaCode = <<<TEXT
type =RESIDENTIAL
state =CA
TEXT;
        $form = $this->installFile("RPA-Sample.pdf", "California Residential Purchase Agreement and Joint Escrow Instructions", "RPA-CA", "2008-12-01");
        $this->addByteCode($form, $rpaCode);
        $this->addBuyerQuestions($form, 1, 100);
        $this->addBuyerQuestions($form, 2, 200);
        $this->addSellerQuestions($form, 1, 300);
        $this->addSellerQuestions($form, 2, 400);
    }

    public function addBuyerQuestions($form, $number, $order) {
        $this->addQuestion($form, $order, "Buyer #{$number} (Full Name)", "string", "buyer_1");
        $order += 10;
        $this->addQuestion($form, $order, "Buyer #{$number} Type", "select", "buyer_1_type", "natural person|trust|entity|other");
    }

    public function addSellerQuestions($form, $number, $order) {
        $this->addQuestion($form, $order, "Seller #{$number} (Full Name)", "string", "seller_1");
        $order += 10;
        $this->addQuestion($form, $order, "Seller #{$number} Type", "radio", "seller_1_type", "natural person|trust|entity|other");
    }

}
