using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

#nullable disable

namespace test.Data.Models
{
    public partial class Marque
    {

        [Key]
        public int MarId { get; set; }

        public string MarNom { get; set; }
    }
}
