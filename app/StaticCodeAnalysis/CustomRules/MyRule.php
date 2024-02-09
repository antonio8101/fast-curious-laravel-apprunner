<?php

namespace App\StaticCodeAnalysis\CustomRules;

use App\Models\Factories\PersonFactory;
use App\Models\Person;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

class MyRule implements Rule {

    public function getNodeType(): string {
        return Node\Expr\New_::class;
    }

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
