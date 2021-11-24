using AutoMapper;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test2.Data.Dtos;
using test2.Data.Models;
using test2.Data.Services;

namespace test2.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class EmployesController:ControllerBase
    {
        private readonly EmployesServices _service;
        private readonly IMapper _mapper;

        public EmployesController(EmployesServices service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        [HttpGet]
        public ActionResult<IEnumerable<EmployeDto>> GetAll()
        {
            return Ok(_mapper.Map<IEnumerable<EmployeDto>>(_service.GetAll()));
        }

        [HttpGet("{id}", Name = "GetById")]
        public ActionResult<IEnumerable<EmployeDto>> GetById(int id)
        {
            Employe itemFromRepo = _service.GetById(id);
            if (itemFromRepo!=null)
            {
                return Ok(_mapper.Map<EmployeDto>(itemFromRepo));
            }
            return NotFound();
        }

        [HttpPost]
        public ActionResult<EmployeDto> Add(Employe employe)
        {
            _service.Add(employe);
            return CreatedAtRoute(nameof(GetById), new { Id = employe.Noemp }, employe);
        }

        [HttpPut("{id}")]
        public ActionResult Update(int id, EmployeDto employe)
        {
            Employe itemFromRepo = _service.GetById(id);
            if (itemFromRepo==null)
            {
                return NotFound();
            }
            _mapper.Map(employe, itemFromRepo);
            _service.Update();
            return NoContent();
        }
        [HttpDelete("{id}")]
        public ActionResult Delete(int id)
        {
            Employe itemFromRepo = _service.GetById(id);
            if (itemFromRepo == null)
            {
                return NotFound();
            }
            _service.Delete(itemFromRepo);
            return NoContent();
        }

    }
}
