<?php
/**
 * Azure Perfume - Luxury E-commerce Helper Mappings
 * Maps database categories and product names to high-end notes, ratings, and filters.
 */

if (!function_exists('get_product_meta')) {
    function get_product_meta($product_id, $category_id, $product_name) {
        // Default values
        $notes = [
            'top' => 'Bergamot, Pink Pepper, Lemon',
            'middle' => 'Rose, Jasmine, Patchouli',
            'base' => 'Amber, White Musk, Vanilla'
        ];
        $rating = 4.8;
        $reviews = ($product_id * 13) % 45 + 12; // pseudo-random reviews
        $gender = 'Unisex';
        $family = 'Fresh';
        
        // Category ID mappings from SQL dump:
        // 3 -> WOODY
        // 4 -> FLORAL
        // 11 -> FRESH
        // 12 -> LEATHER
        
        switch ((int)$category_id) {
            case 3: // WOODY
                $notes = [
                    'top' => 'Cardamom, Cypress, Bergamot',
                    'middle' => 'Cedarwood, Sandalwood, Papyrus',
                    'base' => 'Vetiver, Amber, Dark Patchouli'
                ];
                $family = 'Woody';
                $gender = 'Men';
                $rating = 4.9;
                break;
            case 4: // FLORAL
                $notes = [
                    'top' => 'White Rose, Lychee, Mandarin',
                    'middle' => 'Damask Rose, Peony, Jasmine',
                    'base' => 'White Musk, Honey, Blonde Woods'
                ];
                $family = 'Floral';
                $gender = 'Women';
                $rating = 4.7;
                break;
            case 11: // FRESH
                $notes = [
                    'top' => 'Sea Salt, Grapefruit, Green Apple',
                    'middle' => 'Sage, Seaweed, Rosemary',
                    'base' => 'Ambrette Seed, Cedarwood, Sage'
                ];
                $family = 'Fresh';
                $gender = 'Unisex';
                $rating = 4.8;
                break;
            case 12: // LEATHER
                $notes = [
                    'top' => 'Saffron, Raspberry, Black Pepper',
                    'middle' => 'Tuscan Leather, Jasmine, Thyme',
                    'base' => 'Oud, Amber, Suede, Oakmoss'
                ];
                $family = 'Leather';
                $gender = 'Unisex';
                $rating = 4.9;
                break;
        }

        // Refined overrides based on specific product names for luxury touch
        $name_clean = strtolower($product_name);
        
        if (strpos($name_clean, 'noir') !== false) {
            $notes = [
                'top' => 'Bergamot, Sichuan Pepper',
                'middle' => 'Lavender, Sichuan Pink Pepper, Vetiver',
                'base' => 'Ambroxan, Cedarwood, Labdanum'
            ];
            $gender = 'Men';
            $rating = 4.9;
            $family = 'Oriental Woody';
        } elseif (strpos($name_clean, 'blanche') !== false) {
            $notes = [
                'top' => 'White Rose, Pink Pepper, Violet',
                'middle' => 'Neroli, Peony, Jasmine',
                'base' => 'Blonde Woods, Sandalwood, Musk'
            ];
            $gender = 'Women';
            $rating = 4.8;
            $family = 'Fresh Floral';
        } elseif (strpos($name_clean, 'nautica') !== false) {
            $notes = [
                'top' => 'Mint Leaf, Green Apple, Lemon Zest',
                'middle' => 'Tonka Bean, Ambergris, Geranium Flower',
                'base' => 'Madagascar Vanilla, Vetiver, Oakmoss, Cedarwood'
            ];
            $gender = 'Men';
            $rating = 4.7;
            $family = 'Fresh Aquatic';
        } elseif (strpos($name_clean, 'rose') !== false) {
            $notes = [
                'top' => 'Rose Petals, Litchi, Blackcurrant',
                'middle' => 'Grasse Rose, Bulgarian Rose, Peony',
                'base' => 'White Musk, Cedarwood, Amber'
            ];
            $gender = 'Women';
            $rating = 4.8;
            $family = 'Floral';
        } elseif (strpos($name_clean, 'cedar') !== false) {
            $notes = [
                'top' => 'Grapefruit, Coriander, Basil',
                'middle' => 'Ginger, Cardamom, Orange Blossom',
                'base' => 'Cedarwood, Amber, Tobacco'
            ];
            $gender = 'Men';
            $rating = 4.9;
            $family = 'Woody Spicy';
        } elseif (strpos($name_clean, 'lune') !== false) {
            $notes = [
                'top' => 'Juniper Berry, Coriander, Nutmeg',
                'middle' => 'Amber, Vanilla, Coriander Seeds',
                'base' => 'Woody Notes, Musk, Gold Patchouli'
            ];
            $gender = 'Unisex';
            $rating = 4.8;
            $family = 'Woody Oriental';
        }

        // Pseudo-random gender for variations
        if ($gender === 'Unisex' && ($product_id % 3 == 0)) {
            $gender = 'Men';
        } elseif ($gender === 'Unisex' && ($product_id % 3 == 1)) {
            $gender = 'Women';
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
