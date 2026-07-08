<?php
/**
 * Azure Perfume - Legacy Helper Functions
 * Returns simple product metadata by category and formats currency.
 */

if (!function_exists('get_product_meta')) {
    function get_product_meta($product_id, $category_id, $product_name) {
        $family = 'Signature';
        $gender = 'Unisex';
        $rating = 4.5;
        $reviews = 25;
        $notes = [
            'top' => 'Citrus, Bergamot, Mint',
            'middle' => 'Jasmine, Rose, Sandalwood',
            'base' => 'Musk, Amber, Vanilla'
        ];

        switch ((int)$category_id) {
            case 3:
                $family = 'Woody';
                $gender = 'Men';
                $rating = 4.7;
                $notes = [
                    'top' => 'Cardamom, Cypress, Bergamot',
                    'middle' => 'Cedarwood, Sandalwood, Patchouli',
                    'base' => 'Vetiver, Amber, Oakmoss'
                ];
                break;
            case 4:
                $family = 'Floral';
                $gender = 'Women';
                $rating = 4.6;
                $notes = [
                    'top' => 'Rose, Lychee, Mandarin',
                    'middle' => 'Peony, Jasmine, Tuberose',
                    'base' => 'White Musk, Vanilla, Blonde Woods'
                ];
                break;
            case 11:
                $family = 'Fresh';
                $gender = 'Unisex';
                $rating = 4.5;
                $notes = [
                    'top' => 'Sea Salt, Lemon, Green Apple',
                    'middle' => 'Sage, Rosemary, Lavender',
                    'base' => 'Cedarwood, Ambrette, Musk'
                ];
                break;
            case 12:
                $family = 'Leather';
                $gender = 'Unisex';
                $rating = 4.8;
                $notes = [
                    'top' => 'Saffron, Black Pepper, Citrus',
                    'middle' => 'Leather, Jasmine, Thyme',
                    'base' => 'Oud, Amber, Suede'
                ];
                break;
        }

        return [
            'notes' => $notes,
            'rating' => $rating,
            'reviews' => $reviews,
            'gender' => $gender,
            'family' => $family
        ];
    }
}

if (!function_exists('format_idr')) {
    function format_idr($price) {
        return 'IDR ' . number_format($price, 0, ',', '.');
    }
}
?>
