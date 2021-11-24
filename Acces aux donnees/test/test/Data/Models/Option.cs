using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

#nullable disable

namespace test.Data.Models
{
    public partial class Option
    {
        [Key]
        public int OptId { get; set; }
        public string OptLibelle { get; set; }
        public short OptPrix { get; set; }
    }
}
