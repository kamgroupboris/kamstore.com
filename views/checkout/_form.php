<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Delivery;
use yii\helpers\ArrayHelper;
use \yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>


    <?//= $form->field($model, 'delivery_id')->radioList(ArrayHelper::map(Delivery::find()->all(), 'id', 'name'),['class' => 'i-checks'])->label(false) ?>

    <?=
    $form->field($model, 'delivery_id')
        ->radioList(
            ArrayHelper::map(Delivery::find()->all(), 'id', 'name'),
            [
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<label class="modal-radio">';
                    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                    $return .= '<i></i>';
                    $return .= '<span>' . ucwords($label) . '</span>';
                    $return .= '</label><br>';

                    return $return;
                }
            ]
        )
        ->label(false);
    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::className(),[
            'mask' => '(999) 999-9999'
        ]
    ) ?>

    <?= $form->field($model, 'email')->widget(MaskedInput::className(), [   'clientOptions' => [
        'alias' =>  'email'
    ]]
    )  ?>

    <?= $form->field($model, 'comment')->textarea(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Продолжить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-default btn-md' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
