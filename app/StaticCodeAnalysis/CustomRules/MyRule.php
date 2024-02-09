<?php

namespace App\StaticCodeAnalysis\CustomRules;

use App\Models\Factories\PersonFactory;
use App\Models\Person;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

class MyRule implements Rule {

    /**
     * La funzione getNodeType restituisce una stringa che rappresenta il tipo di nodo dell'Abstract Syntax Tree (AST) che la tua regola desidera analizzare. Nell'esempio fornito, la stringa restituita è \PhpParser\Node\Expr\New_::class, che indica che la regola desidera analizzare nodi di tipo PhpParser\Node\Expr\New_ (riferiti all'uso del costruttore new).
     * La scelta del tipo di nodo è fondamentale, poiché questa sarà la condizione che scatenerà l'esecuzione del metodo processNode quando PHPStan analizza il codice sorgente.
     * Questo metodo serve a identificare quale tipo di nodi nella struttura del codice sorgente saranno gestiti dalla tua regola personalizzata.
     *
     * @return string
     */
    public function getNodeType(): string {
        return Node\Expr\New_::class;
    }


    /**
     * processNode(Node $node, Scope $scope): array
     *
     * Il metodo processNode è chiamato quando PHPStan trova un nodo del tipo specificato da getNodeType durante l'analisi statica del codice sorgente.
     *
     * Riceve due parametri:
     *
     * $node: Il nodo AST che soddisfa la condizione definita da getNodeType. Questo nodo rappresenta un'istanza specifica del tipo di nodo che la tua regola sta cercando.
     * $scope: L'oggetto Scope rappresenta il contesto attuale durante l'analisi, fornendo informazioni sulle variabili, i metodi, le classi, ecc.
     * La funzione restituisce un array di errori (o un array vuoto se non ci sono errori) che verranno segnalati da PHPStan.
     *
     * All'interno di processNode, puoi implementare la logica della tua regola. Puoi esaminare il nodo $node e il contesto $scope per determinare se ci sono violazioni delle regole definite dalla tua regola personalizzata.
     *
     * Gli errori vengono restituiti sotto forma di array di oggetti PHPStan\Rules\RuleError creati utilizzando il RuleErrorBuilder.
     *
     * @param Node $node
     * @param Scope $scope
     *
     * @return array|\PHPStan\Rules\RuleError[]|string[]
     * @throws \PHPStan\ShouldNotHappenException
     */
    public function processNode( Node $node, Scope $scope ): array {

        if (!$node->class instanceof Node\Name) {
            return [];
        }

        // Se la classe istanziata non è Person, restituisci un errore
        if ($node->class->toString() !== Person::class) {
            return [
                RuleErrorBuilder::message(
                    'L\'istanza di Person può essere creata solo tramite PersonFactory.'
                )->build(),
            ];
        }

        // Se siamo all'interno della classe PersonFactory, ignora l'errore
        if (
            $scope->isInClass()
            && $scope->getClassReflection()->getName() === PersonFactory::class
        ) {
            return [];
        }

        // Restituisci un errore di default
        return [
            RuleErrorBuilder::message(
                'L\'istanza di Person può essere creata solo tramite PersonFactory.'
            )->build(),
        ];

    }
}
