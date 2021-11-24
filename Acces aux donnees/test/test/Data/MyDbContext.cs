using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test.Data.Models;

namespace test
{
    public class MyDbContext : DbContext
    {
        public DbSet<Marque> Marques { get; set; }
        public DbSet<Option> Options { get; set; }
        public MyDbContext(DbContextOptions<MyDbContext> options) : base(options)
        {

        }
    }
}
