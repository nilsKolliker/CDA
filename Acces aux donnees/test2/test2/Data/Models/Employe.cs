using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

#nullable disable

namespace test2.Data.Models
{
    public partial class Employe
    {
        [Key]
        public int Noemp { get; set; }
        public string Nomemp { get; set; }
        public string Fonction { get; set; }
        public int? Noresp { get; set; }
        public DateTime? Datemb { get; set; }
        public float? Sala { get; set; }
        public float? Comm { get; set; }
        public int? Nodep { get; set; }
    }
}
