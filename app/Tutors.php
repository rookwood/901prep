<?php

namespace App;

class Tutors
{
    public static function all()
    {
        return collect([
            [
                'name' => 'Nikki Huffstetler',
                'short' => 'nikki',
                'subjects' => 'ACT prep',
                'previewImage' => 'img/team/nikki-head.png',
                'mainImage' => 'img/team/nikki.png',
                'bio' => 'Nikki Huffstetler founded 901 Prep out of a passion for helping students achieve their greatest potential. With her unique set of skills and experience, Nikki is both highly qualified and highly effective in the realm of ACT preparation. Even as a high school and college student, Nikki was helping fellow students achieve academic success. As a native Memphian, she graduated near the top of her high school class and then went on to graduate Magna Cum Laude with a B.A. in Mathematics and French from Union University in Jackson, TN. After college, Nikki went on to teach at a well-respected private school in the Memphis area. During her tenure, she developed a reputation of excellence in the areas of Mathematics and ACT Preparation. After the adoption of her son, Joshua, she decided to step out of the world of teaching and pursue her passion for one on one tutoring. With a reputation for proven results, demand for Nikki\'s time has never been higher. And so 901 Prep was born in order to ensure that the highest number of students have the opportunity to achieve their academic goals, whatever they may be.',
            ],
            [
                'name' => 'Ashley Garrard',
                'short' => 'ashley',
                'subjects' => 'ACT PREP, middle school math, Algebra 1 &amp; 2, and Geometry',
                'previewImage' => 'img/team/ashley-head.png',
                'mainImage' => 'img/team/ashley.png',
                'bio' => 'Ashley is an athletic trainer with a strong math background. She has a BS from The University of Memphis and a Masters in Athletic Training from The University of Arkansas. Having tutored math for several years, she enjoys helping students excel. Ashley is known for building strong and encouraging relationships with her teenage students.',
            ],
            [
                'name' => 'Caroline Hollis',
                'short' => 'caroline',
                'subjects' => 'ACT prep, upper-level, AP, and college mathematics',
                'previewImage' => 'img/team/caroline-head.jpg',
                'mainImage' => 'img/team/caroline.jpg',
                'bio' => 'Caroline Hollis is not your average math tutor. She holds a Bachelor of Science in Mathematics and a Masters in Education. With 11 years experience in the classroom - and a few of those as department chair - she is a master educator in the field of mathematics. During her tenure, Caroline taught almost every course available to high-school students. In 3 years of AP Calculus instruction, her students earned 93% pass rate and an average score of 4.4. As the instructor for Dual Enrollment (College Algebra / Elementary Calculus) with the University of Memphis, she also earned the title of adjunct professor. There are very few people in Memphis better-suited to advanced math education.',
            ],
            // [
            //     'name' => 'Clay Adkison',
            //     'short' => 'clay',
            //     'subjects' => 'ACT prep, math, and sciences',
            //     'previewImage' => 'img/team/clay.jpg',
            //     'mainImage' => 'img/team/clay.jpg',
            //     'bio' => 'Clay has a B.S. in Chemical Engineering from Mississippi State University and works as an environmental engineer for Shelby County.  He loves teaching and has a genuine passion for helping people discover the beauty of science and math.',
            //     'customWidth' => '165px',
            // ],
            // [
            //     'name' => 'Price McGinnis',
            //     'short' => 'price',
            //     'subjects' => 'ACT prep',
            //     'previewImage' => 'img/team/price-head.jpg',
            //     'mainImage' => 'img/team/price.jpg',
            //     'bio' => 'Price is currently a business student at Rhodes College majoring in Economics and Business / Commerce and minoring in History. Price enjoys helping students reach their full potential as well as stimulating academic growth. Having three younger sisters (two of whom are in high school), Price knows and understands how to help high school students succeed. Price is known for having a desire to see his pupils prosper while creating a good rapport with them.',
            //     'customWidth' => '225px',
            // ],
            // [
            //     'name' => 'Haley Bell',
            //     'short' => 'haley',
            //     'subjects' => 'Writing and editing, middle- and high-school Spanish',
            //     'previewImage' => 'img/team/haley-head.jpg',
            //     'mainImage' => 'img/team/haley-head.jpg',
            //     'bio' => 'Born and raised in Memphis, Haley returned here to work as a nurse after studying at Union University in Jackson, TN. She graduated with a Bachelor of Science in Nursing as well as a Bachelor of Art in Spanish and now works as a Neonatal Intensive Care nurse at St. Francis Hospital here in Memphis. She enjoys teaching and helping others achieve their academic ambitions. She has worked at Foreign Language Immersion Childcare Center in Harbortown, lived in Costa Rica while studying Spanish at Universidad Veritas, and desires to work towards being a licensed medical interpreter. With previous tutoring experience, she is looking forward to new adventures and endeavors with the 901 Prep team.',
            //     'customWidth' => '225px',
            // ],
            // [
            //     'name' => 'Anna Hedgepeth',
            //     'short' => 'anna',
            //     'subjects' => 'ACT prep, writing and editing essays for college application, high-school sciences, geometry, and precalculus',
            //     'previewImage' => 'img/team/anna-head.jpg',
            //     'mainImage' => 'img/team/anna.jpg',
            //     'bio' => 'Anna is a middle school teacher with vast experience tutoring high school students in multiple subjects, including standardized test taking.  She has a BS from Cornell University where she majored in Human Development and minored in Education.  As someone who believes in a growth mindset for students rather than fixed intelligence, Anna enjoys helping students set tangible goals and establish the habits and methods of study that work for her individual students.',
            //     'customWidth' => '200px',
            // ],
            [
                'name' => 'Caleb Gallops',
                'short' => 'caleb',
                'subjects' => 'ACT prep, science, and math',
                'previewImage' => 'img/team/caleb-head.jpg',
                'mainImage' => 'img/team/caleb.jpg',
                'bio' => 'Caleb has a B.S. in Chemistry with a minor in Physics from Loyola University New Orleans and is currently working towards a PhD in Physical Chemistry at the University of Memphis. He enjoys seeing students solve difficult problems in their math and science classes. His previous tutoring experience includes high school math, chemistry and physics.',
                'customWidth' => '200px',
            ],
            [
                'name' => 'Sabrina mcCullough',
                'short' => 'sabrina',
                'subjects' => 'ACT prep and math',
                'previewImage' => 'img/team/sabrina-head.jpg',
                'mainImage' => 'img/team/sabrina.jpg',
                'bio' => 'Sabrina McCullough has taught in one of the city’s best private schools for the past 38 years. The majority of those years she’s taught Geometry. Sabrina has also been an adjunct professor through the University of Memphis by teaching Dual Enrollment to high school seniors. Sabrina has a B.S. in mathematics from Christian Brothers University and an M.S. in mathematics from the University of Memphis.',
                'customWidth' => '200px',
            ],
            [
                'name' => 'Holden Brewer',
                'short' => 'holden',
                'subjects' => 'ACT Prep, Spanish, Middle School Math, Algebra 1, Biology',
                'previewImage' => 'img/team/holden-head.jpg',
                'mainImage' => 'img/team/holden.jpg',
                'bio' => 'Holden is a local Memphian who graduated high school near the top of his class with State and District honors and distinction. He loves to help students find an obtainable goal and reach it! Holden is currently pursuing a B.F.A with a concentration of Graphic Design, a B.A. in Spanish, and a minor in Music Performance at the University of Memphis.',
                'customWidth' => '200px',
            ],
            [
                'name' => 'Megan Tate',
                'short' => 'megan',
                'subjects' => 'ELA skills, Research Papers, College App Essays, ACT Writing, General Study Skills',
                'previewImage' => 'img/team/megan-head.jpg',
                'mainImage' => 'img/team/megan.jpg',
                'bio' => 'Megan is a Middle School English teacher with a Bachelor’s Degree in English from the University of Memphis and a Master of Arts in Education from Union University. Megan loves reading and writing and helping others learn to love to learn. She excels at writing instruction and feedback, as well as motivating teenagers. Megan is more than willing to communicate in puns if necessary.',
                'customWidth' => '200px',
            ],
        ]);
    }
}
