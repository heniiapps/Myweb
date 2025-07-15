<?php
session_start();

$questions = [
    ["ques" => "What does a resistor do in a circuit?", "a" => "Stores energy", "b" => "Resists current flow", "c" => "Generates voltage", "d" => "Amplifies signal", "ans" => "b", "exp" => "Resistors limit the flow of electric current."],
    ["ques" => "What unit is used to measure resistance?", "a" => "Volt", "b" => "Watt", "c" => "Ohm", "d" => "Ampere", "ans" => "c", "exp" => "Resistance is measured in Ohms (Ω)."],
    ["ques" => "Which component stores electrical energy?", "a" => "Capacitor", "b" => "Resistor", "c" => "Transistor", "d" => "Diode", "ans" => "a", "exp" => "Capacitors store electrical energy in an electric field."],
    ["ques" => "Which is a semiconductor device?", "a" => "LED", "b" => "Capacitor", "c" => "Resistor", "d" => "Battery", "ans" => "a", "exp" => "LEDs are semiconductor light sources."],
    ["ques" => "Which device converts AC to DC?", "a" => "Inverter", "b" => "Rectifier", "c" => "Oscillator", "d" => "Transformer", "ans" => "b", "exp" => "A rectifier converts alternating current (AC) to direct current (DC)."],
    ["ques" => "The SI unit of capacitance is?", "a" => "Farad", "b" => "Henry", "c" => "Ohm", "d" => "Volt", "ans" => "a", "exp" => "Farad (F) is the SI unit of capacitance."],
    ["ques" => "Which device amplifies signals?", "a" => "Transistor", "b" => "Resistor", "c" => "Capacitor", "d" => "Fuse", "ans" => "a", "exp" => "Transistors amplify electrical signals."],
    ["ques" => "A diode allows current to flow in?", "a" => "Both directions", "b" => "No direction", "c" => "Forward direction", "d" => "Reverse direction", "ans" => "c", "exp" => "Diodes allow current to flow in only one (forward) direction."],
    ["ques" => "What is the function of a fuse?", "a" => "Store energy", "b" => "Amplify signals", "c" => "Protect from overcurrent", "d" => "Rectify current", "ans" => "c", "exp" => "Fuses protect circuits from overcurrent by breaking the circuit."],
    ["ques" => "Which one is a passive component?", "a" => "Transistor", "b" => "IC", "c" => "Resistor", "d" => "Relay", "ans" => "c", "exp" => "Resistors are passive components as they don’t amplify signals."],
    ["ques" => "A transistor has how many terminals?", "a" => "2", "b" => "3", "c" => "4", "d" => "5", "ans" => "b", "exp" => "A transistor has three terminals: base, collector, and emitter."],
    ["ques" => "Which device is used in timing circuits?", "a" => "Op-Amp", "b" => "555 Timer", "c" => "Transistor", "d" => "Rectifier", "ans" => "b", "exp" => "555 Timer is used in timer, delay, pulse generation applications."],
    ["ques" => "Which component opposes change in current?", "a" => "Inductor", "b" => "Resistor", "c" => "Diode", "d" => "Capacitor", "ans" => "a", "exp" => "Inductors resist sudden changes in current."],
    ["ques" => "What type of signal does an analog circuit use?", "a" => "Digital", "b" => "Binary", "c" => "Continuous", "d" => "Discrete", "ans" => "c", "exp" => "Analog circuits work with continuous signals."],
    ["ques" => "What does LED stand for?", "a" => "Low Emission Diode", "b" => "Light Emitting Diode", "c" => "Linear Electric Device", "d" => "Light Emission Detector", "ans" => "b", "exp" => "LED stands for Light Emitting Diode."]
];

$answered = isset($_POST['submit']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Electronics Quiz</title>
    <style>
        body { font-family: Arial; background: #e0f7ff; padding: 20px; }
        .correct { background-color: #c8f7c5; }
        .wrong { background-color: #f8c8c8; }
        .explanation { font-style: italic; color: #555; margin-top: 5px; }
    </style>
</head>
<body>
    <h2>Electronics Quiz (15 Questions)</h2>
    <form method="post">
        <?php foreach ($questions as $i => $q): ?>
            <fieldset style="margin-bottom:15px;">
                <legend>Question <?= $i+1 ?></legend>
                <p><?= $q['ques'] ?></p>
                <?php foreach (['a','b','c','d'] as $opt):
                    $selected = $_POST["q$i"] ?? '';
                    $isCorrect = $opt == $q['ans'];
                    $isUserSelected = $opt == $selected;
                    $class = '';
                    if ($answered && $isUserSelected) {
                        $class = $isCorrect ? 'correct' : 'wrong';
                    }
                ?>
                    <label class="<?= $class ?>">
                        <input type="radio" name="q<?= $i ?>" value="<?= $opt ?>" <?= $isUserSelected ? 'checked' : '' ?>>
                        <?= $q[$opt] ?>
                    </label><br>
                <?php endforeach; ?>
                <?php if ($answered): ?>
                    <div class="explanation">Explanation: <?= $q['exp'] ?></div>
                <?php endif; ?>
            </fieldset>
        <?php endforeach; ?>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
