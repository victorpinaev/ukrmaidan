<?php

use yii\db\Migration;

class m170610_173629_insert_default_posts extends Migration
{
    public function safeUp()
    {
        /*$this->execute("
       INSERT INTO `post` (`id`, `img`, `title`, `issue`, `description`, `rating`, `category_id`, `created_at`, `duration`) VALUES
(1, '593fc66381ee8.jpg', 'Beauty and the Beast', '2017', 'Beauty and the Beast is a 2017 American musical romantic fantasy film directed by Bill Condon from a screenplay written by Stephen Chbosky and Evan Spiliotopoulos, and co-produced by Walt Disney Pictures and Mandeville Films.[5] The film is based on Disney''s 1991 animated film of the same name, itself an adaptation of Jeanne-Marie Leprince de Beaumont''s eighteenth-century fairy tale.[6] The film features an ensemble cast that includes Emma Watson and Dan Stevens as the titular characters with Luke Evans, Kevin Kline, Josh Gad, Ewan McGregor, Stanley Tucci, Audra McDonald, Gugu Mbatha-Raw, Nathan Mack, Ian McKellen and Emma Thompson in supporting roles.[7]\r\nPrincipal photography began at Shepperton Studios in Surrey, England on May 18, 2015, and ended on August 21. Beauty and the Beast premiered on February 23, 2017, at Spencer House in London and was released in the United States on March 17, 2017, in standard, Disney Digital 3-D, RealD 3D, IMAX and IMAX 3D formats along with Dolby Cinema.[8] The film received positive reviews from critics and audiences, with many praising Watson and Stevens'' performances as well the ensemble cast, visual style, and production merits, though it received some criticism on the effects especially those surrounding the Beast, and the multitude of similarities to the original. The film has grossed over $1.2 billion worldwide, surpassing the original film and making it the highest-grossing film of 2017 and the 10th highest-grossing film of all time.', 2, 1, 1496581394, '2:50'),
(2, '593fc73723b18.jpg', 'The Wailing', '2016', 'A small-town policeman tries to find the source of a mysterious virus that is rapidly spreading throughout his village before it claims his daughter. Directed by Na Hong-jin.', 6, 1, 1496754194, '1:45'),
(3, '593fc7b4e3d50.jpg', 'Logan ', '2017', 'In a hideout near the U.S./Mexico border, an aging Logan (Hugh Jackman) cares for the ailing Professor X (Patrick Stewart). However, their sheltered existence comes to a sudden end when a young mutant girl (Dafne Keen) arrives and needs their help to stay safe. James Mangold directed this film, the third Wolverine-based spin-off of the X-Men franchise. ', 2, 1, 1496926994, '1:15'),
(4, '593fc88e924a0.jpg', 'American Crime', '2017', 'Crime offers a unique anthology series filled with surprising revelations and compelling inter-connected narratives that opt for original, emotional human commentary instead of tired arguments over current events.', 7, 2, 1497099794, ''),
(5, '593fc926b2c28.jpg', 'Speechless', '2015', 'Critics Consensus: Speechless speaks to a sensitive topic with a heartfelt lead performance and a fine balance of sensitivity and irreverence.', 8, 2, 1497272594, NULL),
(6, '593fc9c022b78.jpg', 'Harlots', '2014', 'Harlots uses its titillating subject matter to draw the viewer into a deeper drama about the intersection of survival, business, and family.', NULL, 2, 1497301200, NULL),
(7, '593fcad6bbcb0.jpg', 'Sita-Mithila Ki Yoddha', '1995', 'India is beset with divisions, resentment and poverty. The people hate their rulers. They despise their corrupt and selfish elite. Chaos is just one spark away. Outsiders exploit these divisions. Raavan, the demon king of Lanka, grows increasingly powerful, sinking his fangs deeper into the hapless Sapt Sindhu.\r\n\r\nTwo powerful tribes, the protectors of the divine land of India, decide that enough is enough. A saviour is needed. They begin their search.\r\n\r\nAn abandoned baby is found in a field. Protected by a vulture from a pack of murderous wolves. She is adopted by the ruler of Mithila, a powerless kingdom, ignored by all. Nobody believes this child will amount to much. But they are wrong. For she is no ordinary girl. She is Sita.', NULL, 4, 1497301200, NULL),
(8, '593fcb33c2a10.jpg', 'Shivagami Katha Bahubali Khanda', '1999', 'When five-year-old Sivagami witnesses her father being branded a traitor and executed by the maharaja of Mahishmathi, she vows to one day destroy the kingdom. At seventeen, she recovers a manuscript from her crumbling ancestral mansion. Written in a strange language called Paisachi, the manuscript contains a secret that may redeem her father or condemn him further.\r\n\r\nMeanwhile, Kattappa, a proud and idealistic young slave who blindly believes in his duty, finds himself in the service of a spoilt prince. Alongside, he must try and keep his brother, who resents their social position and yearns for freedom, out of trouble.\r\n\r\nAs Sivagami tries to unravel the secret of the manuscript, she finds that the empire of Mahishmathi is teeming with conspirators, palace intrigues, corrupt officials and revolutionaries. An ambitious nobleman will do anything for power and money. A secret group of warriors under the leadership of a seventy-year-old woman is determined to stop the slave trade. A forest tribe, deeply resentful of having been driven away from their holy mountain three hundred years ago, is preparing to wage war against the king.From the pen of Anand Neelakantan, the bestselling author of Asura: Tale of the Vanquished, Roll of the Dice and Rise of Kali, comes The Rise of Sivagami, filled with staggering intrigues and unforgettable characters. A riveting tale of intrigue and power, revenge and betrayal, The Rise of Sivagami is a befitting prequel to S. S. Rajamouli’s blockbuster film Bāhubali.', NULL, 4, 1497301200, NULL);
        ");*/

    }

    public function safeDown()
    {
        $this->truncateTable('post');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170610_153629_insert_default_posts cannot be reverted.\n";

        return false;
    }
    */
}
