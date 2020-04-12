<?php


namespace Mitosis\Properties\Tests;

use Mitosis\Properties\PropertyTypes;
use Mitosis\Properties\Exceptions\UnknownPropertyTypeException;
use Mitosis\Properties\Models\Property;
use Mitosis\Properties\Tests\Examples\MaterialPropertyType;
use Mitosis\Properties\Types\Boolean;
use Mitosis\Properties\Types\Integer;
use Mitosis\Properties\Types\Number;
use Mitosis\Properties\Types\Text;

class PropertyTypeTest extends TestCase
{
    /**
     * @test
     * @dataProvider builtInTypesProvider
     */
    public function built_in_types_are_available(string $typeName, string $expectedClass)
    {
        $property = Property::create([
            'name' => sprintf('Example %s property', ucfirst($typeName)),
            'type' => $typeName
        ]);

        $this->assertInstanceOf($expectedClass, $property->getType());
    }

    /** @test */
    public function new_types_can_be_registered()
    {
        PropertyTypes::register('material', MaterialPropertyType::class);

        $property = Property::create([
            'name' => 'Material',
            'type' => 'material'
        ]);

        $this->assertInstanceOf(MaterialPropertyType::class, $property->getType());
    }

    /** @test */
    public function attempting_to_retrieve_an_unregistered_property_type_throws_an_exception()
    {
        $property = Property::create([
            'name' => 'I am bad',
            'type' => 'i do not exist'
        ]);

        $this->expectException(UnknownPropertyTypeException::class);
        $property->getType();
    }

    /** @test */
    public function registering_a_property_type_without_implementing_the_interface_is_not_allowed()
    {
        $this->expectException(\InvalidArgumentException::class);
        PropertyTypes::register('whatever', \stdClass::class);
    }

    public function builtInTypesProvider()
    {
        return [
            ['text', Text::class],
            ['boolean', Boolean::class],
            ['integer', Integer::class],
            ['number', Number::class],
        ];
    }
}
