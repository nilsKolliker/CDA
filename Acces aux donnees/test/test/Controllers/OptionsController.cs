using AutoMapper;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test.Data.Dtos;
using test.Data.Models;
using test.Data.Services;

namespace test.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class OptionsController:ControllerBase
    {
        private readonly OptionsServices _service;
        private readonly IMapper _mapper;

        public OptionsController(OptionsServices service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        [HttpGet]
        public ActionResult<IEnumerable<OptionsDto>> getAllOptions()
        {
            IEnumerable<Option> liste = _service.GetAllOptions();
            return Ok(_mapper.Map<IEnumerable<OptionsDto>>(liste));
        }

        [HttpGet("{id}",Name ="GetOptionById")]
        public ActionResult<OptionsDto>GetOptionById(int id)
        {
            Option commandItem = _service.GetOptionById(id);
            if (commandItem!=null)
            {
                return Ok(_mapper.Map<OptionsDto>(commandItem));
            }
            return NotFound();
        }

        [HttpPost]
        public ActionResult<OptionsDto> CreateOption(Option option)
        {
            _service.AddOptions(option);
            return CreatedAtRoute(nameof(GetOptionById), new { Id = option.OptId }, option);
        }

        [HttpPut("{id}")]
        public ActionResult UpdateOption (int id, OptionsDto option)
        {
            Option optionFromRepo = _service.GetOptionById(id);
            if (optionFromRepo==null)
            {
                return NotFound();
            }
            _mapper.Map(option, optionFromRepo);
            _service.UpdateOption(optionFromRepo);
            return NoContent();
        }
        [HttpDelete("{id}")]
        public ActionResult DeleteOption(int id)
        {
            Option optionFromRopo = _service.GetOptionById(id);
            if (optionFromRopo==null)
            {
                return NotFound();
            }
            _service.DeleteOptions(optionFromRopo);
            return NoContent();
        }
    }
}
